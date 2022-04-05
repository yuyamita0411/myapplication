<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'appliusers',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'appliusers',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'appliusers',
            'hash' => false,
        ]
    ],

    'providers' => [
        'appliusers' => [
            'driver' => 'eloquent',
            'model' => App\Models\AppliUser::class,
        ],
    ],

    'passwords' => [
        'appliusers' => [
            'provider' => 'appliusers',
            'table' => 'appli_users',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
