<?php

namespace Yoosuf\Barcode\Drivers;

use BaconQrCode\Renderer\Image\ImageRenderer;
use BaconQrCode\Renderer\Image\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;
use Yoosuf\Barcode\Contracts\BarcodeDriver;
use Yoosuf\Barcode\Support\BarcodeResult;

class BaconQrCodeDriver implements BarcodeDriver
{
    public function render(string $value, array $options = []): BarcodeResult
    {
        $size = (int) ($options['size'] ?? 300);
        $margin = (int) ($options['margin'] ?? 10);

        $renderer = new ImageRenderer(new RendererStyle($size, $margin), new SvgImageBackEnd);
        $writer = new Writer($renderer);
        $svg = $writer->writeString($value);

        return new BarcodeResult($svg, 'image/svg+xml', 'svg');
    }
}
