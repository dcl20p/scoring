<?php

namespace App\Services;

use App\Models\FailedLogin;
use App\Models\User;
use App\Models\UserDevice;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthManager
{
    /**
     * Maximum failed login attempts
     *
     * @var int
     */
    protected $maxAttempts = 5;

    /**
     * Lockout time in minutes
     *
     * @var int
     */
    protected $lockoutTime = 5;

    /**
     * Handle a login request
     *
     * @param Request $request
     * @param array $credentials
     * @return array
     */
    public function handleLogin(Request $request, array $credentials)
    {
        $email = $credentials['email'];
        $user = User::where('email', $email)->first();

        // Check if user exists
        if (!$user) {
            return [
                'success' => false,
                'message' => 'These credentials do not match our records.',
            ];
        }

        // Check if user is locked out due to too many failed attempts
        if ($user->hasReachedMaxLoginAttempts($this->maxAttempts, $this->lockoutTime)) {
            return [
                'success' => false,
                'message' => 'Too many login attempts. Please try again in ' . $this->lockoutTime . ' minutes.',
                'lockout' => true,
            ];
        }

        // Attempt to authenticate
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            $this->recordFailedLogin($request, $user->id);
            
            return [
                'success' => false,
                'message' => 'These credentials do not match our records.',
            ];
        }

        // Authentication successful
        $user = Auth::user();
        
        // Handle device management
        return $this->handleDeviceManagement($request, $user);
    }

    /**
     * Record a failed login attempt
     *
     * @param Request $request
     * @param int $userId
     * @return void
     */
    protected function recordFailedLogin(Request $request, $userId)
    {
        FailedLogin::create([
            'user_id' => $userId,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'last_used_at' => now(),
        ]);
    }

    /**
     * Handle device management after successful login
     *
     * @param Request $request
     * @param User $user
     * @return array
     */
    protected function handleDeviceManagement(Request $request, User $user)
    {
        // Generate device information
        $userAgent = $request->userAgent();
        $ipAddress = $request->ip();
        $deviceId = UserDevice::generateDeviceId($userAgent, $ipAddress, $user->id);
        $deviceName = $this->determineDeviceName($userAgent);

        // Check if this device is already registered
        $device = UserDevice::where('user_id', $user->id)
            ->where('device_id', $deviceId)
            ->first();

        $isNewDevice = false;

        if (!$device) {
            // New device
            $isNewDevice = true;
            $device = UserDevice::create([
                'user_id' => $user->id,
                'device_id' => $deviceId,
                'device_name' => $deviceName,
                'user_agent' => $userAgent,
                'ip_address' => $ipAddress,
                'last_used_at' => now(),
            ]);
        } else {
            // Update existing device
            $device->update([
                'last_used_at' => now(),
                'ip_address' => $ipAddress,
            ]);
        }

        // Check if we need to invalidate other sessions
        if (config('auth_devices.single_device_login') && !$device->is_trusted) {
            $this->invalidateOtherSessions($user->id, $deviceId);
        }

        // Create or update the session
        $session = UserSession::updateOrCreate(
            ['user_id' => $user->id, 'device_id' => $deviceId],
            [
                'last_active_at' => now(),
                'expires_at' => $request->boolean('remember') ? now()->addDays(30) : now()->addHours(2),
            ]
        );

        // Store session in Redis for faster lookup
        $this->storeSessionInRedis($user->id, $deviceId, $session->id);

        return [
            'success' => true,
            'user' => $user,
            'is_new_device' => $isNewDevice,
            'device' => $device,
            'message' => $isNewDevice ? 'Logged in from a new device.' : 'Welcome back!',
        ];
    }

    /**
     * Determine device name from user agent
     *
     * @param string $userAgent
     * @return string
     */
    protected function determineDeviceName($userAgent)
    {
        $deviceName = 'Unknown';
        
        // Extract device information from user agent
        if (preg_match('/(iPhone|iPad|iPod|Android|BlackBerry|Windows Phone|Windows|Macintosh|Linux)/i', $userAgent, $matches)) {
            $platform = $matches[0];
            
            if (strpos($userAgent, 'Mobile') !== false && $platform !== 'iPhone' && $platform !== 'Android') {
                $platform .= ' Mobile';
            }
            
            $browserInfo = [];
            if (preg_match('/(Chrome|Firefox|Safari|Edge|MSIE|Trident|Opera)/i', $userAgent, $browserInfo)) {
                $browser = str_replace(['Trident', 'MSIE'], 'Internet Explorer', $browserInfo[0]);
                $deviceName = $platform . ' - ' . $browser;
            } else {
                $deviceName = $platform;
            }
        }
        
        return $deviceName;
    }

    /**
     * Invalidate all other sessions for a user
     *
     * @param int $userId
     * @param string $exceptDeviceId
     * @return void
     */
    public function invalidateOtherSessions($userId, $exceptDeviceId = null)
    {
        $sessions = UserSession::where('user_id', $userId);
        
        if ($exceptDeviceId) {
            $sessions->where('device_id', '!=', $exceptDeviceId);
        }
        
        $sessionsToInvalidate = $sessions->get();
        
        foreach ($sessionsToInvalidate as $session) {
            // Remove from Redis
            Redis::del("user:{$userId}:device:{$session->device_id}");
            
            // Delete the session
            $session->delete();
        }
    }

    /**
     * Store session in Redis for faster lookup
     *
     * @param int $userId
     * @param string $deviceId
     * @param int $sessionId
     * @return void
     */
    protected function storeSessionInRedis($userId, $deviceId, $sessionId)
    {
        $key = "user:{$userId}:device:{$deviceId}";
        $data = [
            'session_id' => $sessionId,
            'user_id' => $userId,
            'device_id' => $deviceId,
            'last_active' => now()->timestamp,
        ];
        
        // Store session data with TTL of 24 hours (can be adjusted)
        Redis::setex($key, 86400, json_encode($data));
    }

    /**
     * Update device trust status
     *
     * @param int $userId
     * @param string $deviceId
     * @param bool $isTrusted
     * @return bool
     */
    public function updateDeviceTrustStatus($userId, $deviceId, $isTrusted)
    {
        $device = UserDevice::where('user_id', $userId)
            ->where('device_id', $deviceId)
            ->first();
            
        if (!$device) {
            return false;
        }
        
        $device->update(['is_trusted' => $isTrusted]);
        return true;
    }

    /**
     * Get active sessions for a user
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActiveSessions($userId)
    {
        return UserSession::where('user_id', $userId)
            ->with('device')
            ->orderBy('last_active_at', 'desc')
            ->get();
    }
}
