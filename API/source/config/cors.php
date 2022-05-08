<?php

return [

//    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'paths' => ['cor-test', 'api/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

//    'allowed_origins_patterns' => [],

    'allowed_origins_patterns' => ['/localhost:?[0-9]*/'],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
//    'supports_credentials' => true,

];
