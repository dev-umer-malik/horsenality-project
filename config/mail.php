<?php

return [

    'driver' => env('MAIL_MAILER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.googlemail.com'),

    'port' => env('MAIL_PORT', 465),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'horsenality@parelli.com'),
        'name' => env('MAIL_FROM_NAME', 'Parelli Horsenality'),
    ],

    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),

    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

    'sendmail' => env('MAIL_SENDMAIL', '/usr/sbin/sendmail -bs'),

    'markdown' => [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
];

