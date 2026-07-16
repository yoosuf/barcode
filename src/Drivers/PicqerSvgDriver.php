<?php

namespace Yoosuf\Barcode\Drivers;

use Picqer\Barcode\BarcodeGeneratorSVG;
use Yoosuf\Barcode\Contracts\BarcodeDriver;
use Yoosuf\Barcode\Support\BarcodeResult;
use Yoosuf\Barcode\Support\BarcodeType;

class PicqerSvgDriver implements BarcodeDriver
{
    public function render(string $value, array $options = []): BarcodeResult
    {
        $generator = new BarcodeGeneratorSVG;
        $type = BarcodeType::resolve((string) ($options['type'] ?? BarcodeType::TYPE_CODE_128));
        $width = (int) ($options['width'] ?? 2);
        $height = (int) ($options['height'] ?? 60);

        $svg = $generator->getBarcode($value, $type, $width, $height);

        return new BarcodeResult($svg, 'image/svg+xml', 'svg');
    }
}
