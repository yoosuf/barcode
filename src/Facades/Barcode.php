<?php

namespace Yoosuf\Barcode\Facades;

use Illuminate\Support\Facades\Facade;

class Barcode extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'barcode';
    }
}
