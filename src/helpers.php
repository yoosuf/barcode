<?php

use Yoosuf\Barcode\BarcodeManager;

if (! function_exists('barcode')) {
    function barcode(): BarcodeManager
    {
        return app(BarcodeManager::class);
    }
}
