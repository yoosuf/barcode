<?php

namespace Yoosuf\Barcode\Support;

class BarcodeResult
{
    public function __construct(
        public readonly string $contents,
        public readonly string $mimeType,
        public readonly string $extension
    ) {
    }

    public function dataUri(): string
    {
        return 'data:'.$this->mimeType.';base64,'.base64_encode($this->contents);
    }
}
