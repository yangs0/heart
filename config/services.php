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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'youdao' => [
        'key' => env('YOUDAO_API_KEY'),
        'from' => env('YOUDAO_KEY_FROM'),
    ],

    'github' => [
        'client_id' => '0dc4b5b1101f5c4b9fe0',
        'client_secret' => '3b6f13ddc614a7b5630835716a62a02ae035e036',
        'redirect' => 'http://localhost:8000/login/black/github'
    ],
    'weibo' => [
        'client_id' => "1422586059",
        'client_secret' => 'ff25f25ca087c6b70f6c1d5311aee0dc',//env('WEIBO_SECRET'),
        'redirect' => 'http://localhost:8000/login/black/weibo',
    ],

];
