<?php

namespace Yoosuf\Barcode\Contracts;

use Yoosuf\Barcode\Support\BarcodeResult;

interface BarcodeDriver
{
    public function render(string $value, array $options = []): BarcodeResult;
}
