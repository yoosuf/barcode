<?php

namespace Yoosuf\Barcode\Support;

use Picqer\Barcode\BarcodeGenerator;

class BarcodeType
{
    public const TYPE_CODE_32 = BarcodeGenerator::TYPE_CODE_32;
    public const TYPE_CODE_128 = BarcodeGenerator::TYPE_CODE_128;
    public const TYPE_CODE_128_A = BarcodeGenerator::TYPE_CODE_128_A;
    public const TYPE_CODE_128_B = BarcodeGenerator::TYPE_CODE_128_B;
    public const TYPE_CODE_128_C = BarcodeGenerator::TYPE_CODE_128_C;
    public const TYPE_CODE_39 = BarcodeGenerator::TYPE_CODE_39;
    public const TYPE_CODE_39_CHECKSUM = BarcodeGenerator::TYPE_CODE_39_CHECKSUM;
    public const TYPE_CODE_39E = BarcodeGenerator::TYPE_CODE_39E;
    public const TYPE_CODE_39E_CHECKSUM = BarcodeGenerator::TYPE_CODE_39E_CHECKSUM;
    public const TYPE_CODE_93 = BarcodeGenerator::TYPE_CODE_93;
    public const TYPE_CODABAR = BarcodeGenerator::TYPE_CODABAR;
    public const TYPE_CODE_11 = BarcodeGenerator::TYPE_CODE_11;
    public const TYPE_EAN_13 = BarcodeGenerator::TYPE_EAN_13;
    public const TYPE_EAN_8 = BarcodeGenerator::TYPE_EAN_8;
    public const TYPE_EAN_2 = BarcodeGenerator::TYPE_EAN_2;
    public const TYPE_EAN_5 = BarcodeGenerator::TYPE_EAN_5;
    public const TYPE_INTERLEAVED_2_5 = BarcodeGenerator::TYPE_INTERLEAVED_2_5;
    public const TYPE_INTERLEAVED_2_5_CHECKSUM = BarcodeGenerator::TYPE_INTERLEAVED_2_5_CHECKSUM;
    public const TYPE_ITF_14 = BarcodeGenerator::TYPE_ITF_14;
    public const TYPE_KIX = BarcodeGenerator::TYPE_KIX;
    public const TYPE_IMB = BarcodeGenerator::TYPE_IMB;
    public const TYPE_MSI = BarcodeGenerator::TYPE_MSI;
    public const TYPE_MSI_CHECKSUM = BarcodeGenerator::TYPE_MSI_CHECKSUM;
    public const TYPE_PHARMA_CODE = BarcodeGenerator::TYPE_PHARMA_CODE;
    public const TYPE_PHARMA_CODE_TWO_TRACKS = BarcodeGenerator::TYPE_PHARMA_CODE_TWO_TRACKS;
    public const TYPE_PLANET = BarcodeGenerator::TYPE_PLANET;
    public const TYPE_POSTNET = BarcodeGenerator::TYPE_POSTNET;
    public const TYPE_RMS4CC = BarcodeGenerator::TYPE_RMS4CC;
    public const TYPE_STANDARD_2_5 = BarcodeGenerator::TYPE_STANDARD_2_5;
    public const TYPE_STANDARD_2_5_CHECKSUM = BarcodeGenerator::TYPE_STANDARD_2_5_CHECKSUM;
    public const TYPE_TELEPEN_ALPHA = BarcodeGenerator::TYPE_TELEPEN_ALPHA;
    public const TYPE_TELEPEN_NUMERIC = BarcodeGenerator::TYPE_TELEPEN_NUMERIC;
    public const TYPE_UPC_A = BarcodeGenerator::TYPE_UPC_A;
    public const TYPE_UPC_E = BarcodeGenerator::TYPE_UPC_E;

    public static function resolve(string $type): int|string
    {
        if (defined(self::class.'::'.$type)) {
            return constant(self::class.'::'.$type);
        }

        return $type;
    }
}
