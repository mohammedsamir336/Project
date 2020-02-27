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
    'client_id' => '189848882244202',
    'client_secret' => '338e396656f20cd8a2e9cbec199dddbd',
    'redirect' => url('/login/facebook/callback'),

    ],

    'google' => [
    'client_id' => '1037562265405-nj8ddl01rbq7m9lgfav96884ucujvf8k.apps.googleusercontent.com',
    'client_secret' => '9_LHm0ZOFvPHq4-yEubWC_OG',
    'redirect' =>   url('/login/google/callback'),

    ],


    'github' => [
    'client_id' => '5f38706db85c1e17bafa',
    'client_secret' => '4e155e1402e243b7f01a80daed6828e6be71bdf2',
    'redirect' => url('/login/github/callback'),

    ],


    'Twitter' => [
    'client_id' => 'jvVgZoMJFDGF0nuSRFzrE4jO3',
    'client_secret' => 'onPJd84dU1ZrHgsGmWCFBI4iv5octmWDLQooJ1TZix1T34ttjf',
    'redirect' => url('/login/Twitter/callback'),

    ],

    'yahoo' => [
    'client_id' => 'dj0yJmk9TWlnd3JWSXAwRTRMJmQ9WVdrOVRqRm9NRTkxTjJzbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PTEz',
    'client_secret' => '0e40274ae9d9c46bdde4e74723a8d55dfce78560',
    'redirect' => url('/login/yahoo/callback'),

    ],

];
