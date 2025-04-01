<?php

namespace App\Http\Middleware;

use App\Models\UserDevice;
use App\Models\UserSession;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class TrackUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Only track sessions for authenticated users
        if (Auth::check()) {
            $user = Auth::user();
            $userAgent = $request->userAgent();
            $ipAddress = $request->ip();
            $deviceId = UserDevice::generateDeviceId($userAgent, $ipAddress, $user->id);
            
            // Check if device exists, if not create it
            $device = UserDevice::firstOrCreate(
                ['user_id' => $user->id, 'device_id' => $deviceId],
                [
                    'device_name' => $this->determineDeviceName($userAgent),
                    'user_agent' => $userAgent,
                    'ip_address' => $ipAddress,
                    'last_used_at' => now()
                ]
            );
            
            // Update last used timestamp for the device
            if (!$device->wasRecentlyCreated) {
                $device->update([
                    'last_used_at' => now(),
                    'ip_address' => $ipAddress,
                ]);
            }
            
            // Check if session exists, if not create it
            $session = UserSession::updateOrCreate(
                ['user_id' => $user->id, 'device_id' => $deviceId],
                [
                    'last_active_at' => now(),
                    'expires_at' => now()->addHours(2)
                ]
            );
            
            // Store session data in Redis
            $key = "user:{$user->id}:device:{$deviceId}";
            $data = [
                'session_id' => $session->id,
                'user_id' => $user->id,
                'device_id' => $deviceId,
                'last_active' => now()->timestamp,
                'ip_address' => $ipAddress,
            ];
            
            Redis::setex($key, 86400, json_encode($data));
            
            // If single device login is enabled and this is not a trusted device,
            // we might want to invalidate other sessions, but we've already done
            // that at login time in the AuthManager.
        }
        
        return $response;
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
}
