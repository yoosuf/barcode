<?php

namespace Yoosuf\Barcode\Support;

use Picqer\Barcode\BarcodeGenerator;

class BarcodeType
{
    public const TYPE_CODE_128 = BarcodeGenerator::TYPE_CODE_128;
    public const TYPE_CODE_39 = BarcodeGenerator::TYPE_CODE_39;
    public const TYPE_CODABAR = BarcodeGenerator::TYPE_CODABAR;
    public const TYPE_EAN_13 = BarcodeGenerator::TYPE_EAN_13;
    public const TYPE_EAN_8 = BarcodeGenerator::TYPE_EAN_8;
    public const TYPE_UPC_A = BarcodeGenerator::TYPE_UPC_A;
    public const TYPE_UPC_E = BarcodeGenerator::TYPE_UPC_E;
    public const TYPE_QR_CODE = 'TYPE_QR_CODE';

    public static function resolve(string $type): int|string
    {
        if (defined(self::class.'::'.$type)) {
            return constant(self::class.'::'.$type);
        }

        return $type;
    }
}
