<?php

return [

    'defaults' => [
        'guard' => 'web',  // Default guard set to 'web'
        'passwords' => 'users',  // Password reset settings for users
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',  // Using session driver for web guard
            'provider' => 'users',  // Provider is set to 'users'
        ],

        'provider' => [
            'driver' => 'session',  // Using session driver for provider guard
            'provider' => 'providers',  // Corrected to 'providers'
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',  // Eloquent provider for User model
            'model' => App\Models\User::class,  // The User model
        ],

        'providers' => [
            'driver' => 'eloquent',  // Eloquent provider for Provider model
            'model' => App\Models\Provider::class,  // The Provider model
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',  // Password resets for users
            'table' => 'password_reset_tokens',  // Table for reset tokens
            'expire' => 60,  // Expiry time in minutes
            'throttle' => 60,  // Throttle time in seconds
        ],
    ],

    'password_timeout' => 10800,  // Password confirmation timeout
];
