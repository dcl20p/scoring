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
            
            $lastActiveKey = "user:{$user->id}:last_active";

            // Check more than 5 minutes since last update then update DB
            $lastActive = Redis::get($lastActiveKey);
            $ttl = config('session.lifetime') * 60;

            if (!$lastActive || now()->diffInMinutes($lastActive) >= 5) {
                UserDevice::updateOrCreate(
                    ['user_id' => $user->id, 'device_id' => $deviceId],
                    ['last_used_at' => now(), 'ip_address' => $ipAddress]
                );
                
                $session = UserSession::updateOrCreate(
                    ['user_id' => $user->id, 'device_id' => $deviceId],
                    ['last_active_at' => now(), 'expires_at' => now()->addSeconds($ttl)]
                );
                
                Redis::setex($lastActiveKey, 300, now()); // TTL 5ph
            }
        }
        
        return $response;
    }
}
