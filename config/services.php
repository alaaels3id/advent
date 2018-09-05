<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
        'client_id' => '4c43094ab1c69836419d',
        'client_secret' => 'edc5f873ca5d6ddec11e75ecbf41ac1ef3e745f5',
        'redirect' => 'http://localhost:8000/login/github/callback',   
    ],
    
    'twitter' => [
        'client_id' => 'lLWcLpvfqxEMBps4mXn8zeDLH',
        'client_secret' => 'Qxxs2Wlaqxld0demZ6AUgEFByd25Lw4VdJWIyjkrfPMXTwcB2a',
        'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],

    'facebook' => [
        'client_id' => '1902091500080950',
        'client_secret' => 'd16db5e71c79a6419f24dff82cd53dc2',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
];
