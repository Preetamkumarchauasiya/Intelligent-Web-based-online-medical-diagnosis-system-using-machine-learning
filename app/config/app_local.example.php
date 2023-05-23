<?php

return [
    
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),


    'Security' => [
        'salt' => env('SECURITY_SALT', '__SALT__'),
    ],


    'Datasources' => [
        'default' => [
            'host' => 'localhost',

            'username' => 'my_app',
            'password' => 'secret',

            'database' => 'my_app',
            'url' => env('DATABASE_URL', null),
        ],

        'test' => [
            'host' => 'localhost',
            //'port' => 'non_standard_port_number',
            'username' => 'my_app',
            'password' => 'secret',
            'database' => 'test_myapp',
            //'schema' => 'myapp',
            'url' => env('DATABASE_TEST_URL', 'sqlite://127.0.0.1/tests.sqlite'),
        ],
    ],
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
