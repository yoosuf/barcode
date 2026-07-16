<?php

namespace Yoosuf\Barcode\Drivers;

use Picqer\Barcode\BarcodeGeneratorHTML;
use Yoosuf\Barcode\Contracts\BarcodeDriver;
use Yoosuf\Barcode\Support\BarcodeResult;
use Yoosuf\Barcode\Support\BarcodeType;

class PicqerHtmlDriver implements BarcodeDriver
{
    public function render(string $value, array $options = []): BarcodeResult
    {
        $generator = new BarcodeGeneratorHTML;
        $type = BarcodeType::resolve((string) ($options['type'] ?? BarcodeType::TYPE_CODE_128));
        $width = (int) ($options['width'] ?? 2);
        $height = (int) ($options['height'] ?? 60);

        $html = $generator->getBarcode($value, $type, $width, $height);

        return new BarcodeResult($html, 'text/html', 'html');
    }
}
