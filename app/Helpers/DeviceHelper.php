<?php

namespace App\Helpers;

class DeviceHelper
{
    public static function determineDeviceName(string $userAgent): string
    {
        $deviceName = 'Unknown';

        if (preg_match('/(iPhone|iPad|iPod|Android|BlackBerry|Windows Phone|Windows|Macintosh|Linux)/i', $userAgent, $matches)) {
            $platform = $matches[0];

            if (strpos($userAgent, 'Mobile') !== false && $platform !== 'iPhone' && $platform !== 'Android') {
                $platform .= ' Mobile';
            }

            if (preg_match('/(Chrome|Firefox|Safari|Edge|MSIE|Trident|Opera)/i', $userAgent, $browserInfo)) {
                $browser = str_replace(['Trident', 'MSIE'], 'Internet Explorer', $browserInfo[0]);
                $deviceName = "{$platform} - {$browser}";
            } else {
                $deviceName = $platform;
            }
        }

        return $deviceName;
    }
}
