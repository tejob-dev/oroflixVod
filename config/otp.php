<?php

return [
    'otp_service_enabled' => true,
    'otp_default_service' => env("OTP_SERVICE", "twilio"),
    'services' => [
        'biotekno' => [
            "class" => App\OtpServices\BioTekno::class,
            "username" => env('OTP_USERNAME', null),
            "password" => env('OTP_PASSWORD', null),
            "transmission_id" => env('OTP_TRANSMISSION_ID', null)
        ],
        'nexmo' => [
            'class' => App\OtpServices\Nexmo::class,
            'api_key' => env("OTP_API_KEY", null),
            'api_secret' => env('OTP_API_SECRET', null),
            'from' => env('OTP_FROM', null)
        ],
        'twilio' => [
            'class' => App\OtpServices\Twilio::class,
            'account_sid' => env("TWILIO_SID", null),
            'auth_token' => env("TWILIO_AUTH_TOKEN", null),
            'from' => env("TWILIO_NUMBER", null)
        ]
    ],
    'users_table' => 'users',
    'user_phone_field' => 'mobile',
    'user_id_field' => 'id',
    'otp_reference_number_length' => 6,
    'otp_timeout' => 300,
    'otp_digit_length' => 6,
    'encode_password' => false,
];
