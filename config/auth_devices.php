<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Single Device Login
    |--------------------------------------------------------------------------
    |
    | This option determines whether a user can be logged in on multiple
    | devices simultaneously. If set to true, logging in on a new device
    | will log the user out from all other devices.
    |
    */
    'single_device_login' => env('SINGLE_DEVICE_LOGIN', false),

    /*
    |--------------------------------------------------------------------------
    | Max Login Attempts
    |--------------------------------------------------------------------------
    |
    | This value determines the maximum number of failed login attempts before
    | the user is temporarily locked out from trying to login again.
    |
    */
    'max_login_attempts' => env('MAX_LOGIN_ATTEMPTS', 5),

    /*
    |--------------------------------------------------------------------------
    | Login Lockout Time
    |--------------------------------------------------------------------------
    |
    | This value determines the number of minutes a user should wait after 
    | reaching the maximum failed login attempts before trying again.
    |
    */
    'login_lockout_time' => env('LOGIN_LOCKOUT_TIME', 5),

    /*
    |--------------------------------------------------------------------------
    | Device History Retention Period
    |--------------------------------------------------------------------------
    |
    | Number of days to keep device history records
    |
    */
    'device_history_days' => env('DEVICE_HISTORY_DAYS', 90),
];