<?php

return [
    'serverKey' => env('MIDTRANS_SERVER_KEY', null),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', true)
];
