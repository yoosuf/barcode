<?php

return [
    'default' => env('BARCODE_DRIVER', 'svg'),

    'defaults' => [
        'type' => env('BARCODE_TYPE', 'TYPE_CODE_128'),
        'width' => (int) env('BARCODE_WIDTH_FACTOR', 2),
        'height' => (int) env('BARCODE_HEIGHT', 60),
        'foreground_color' => env('BARCODE_FOREGROUND_COLOR', '#000000'),
    ],

    'drivers' => [
        'svg' => [
            'driver' => 'svg',
        ],

        'png' => [
            'driver' => 'png',
        ],

        'html' => [
            'driver' => 'html',
        ],

        'qrcode' => [
            'driver' => 'qrcode',
            'size' => (int) env('BARCODE_QR_SIZE', 300),
            'margin' => (int) env('BARCODE_QR_MARGIN', 10),
        ],
    ],
];
