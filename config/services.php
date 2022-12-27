<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '2982245722081449', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '247ac6b213fba3eeac2ae8e03ae21b48', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://project.test/facebook/callback/'
    ],
    'google' => [
        'client_id' => '150184604237-88i8ulueute38k9igqr44r1lsn66rmkb.apps.googleusercontent.com',
        'client_secret' => 'Ayk1QgTHvJQDVhbZipjx6OUv',
        'redirect' => 'https://project.test/auth/google/callback',
    ],
];
