<?php

namespace Yoosuf\Barcode;

use Closure;
use Illuminate\Contracts\Filesystem\Factory as FilesystemFactory;
use Yoosuf\Barcode\Contracts\BarcodeDriver;
use Yoosuf\Barcode\Exceptions\BarcodeException;
use Yoosuf\Barcode\Support\BarcodeResult;

class BarcodeManager
{
    /** @var array<string, Closure(string, array): BarcodeDriver> */
    protected array $customCreators = [];

    /** @var array<string, BarcodeDriver> */
    protected array $drivers = [];

    public function __construct(
        protected FilesystemFactory $filesystem
    ) {
    }

    public function extend(string $driver, Closure $creator): self
    {
        $this->customCreators[$driver] = $creator;

        return $this;
    }

    public function driver(?string $name = null): BarcodeDriver
    {
        $name = $name ?: $this->getDefaultDriver();

        if (! isset($this->drivers[$name])) {
            $this->drivers[$name] = $this->resolveDriver($name);
        }

        return $this->drivers[$name];
    }

    public function render(string $value, ?string $driver = null, array $options = []): BarcodeResult
    {
        $driverName = $driver ?: $this->getDefaultDriver();
        $finalOptions = array_merge(
            $this->getDefaultOptions(),
            (array) config("barcode.drivers.{$driverName}", []),
            $options
        );

        return $this->driver($driverName)->render($value, $finalOptions);
    }

    public function dataUri(string $value, ?string $driver = null, array $options = []): string
    {
        return $this->render($value, $driver, $options)->dataUri();
    }

    public function save(string $path, string $value, ?string $driver = null, array $options = [], ?string $disk = null): string
    {
        $result = $this->render($value, $driver, $options);
        $filesystem = $this->filesystem->disk($disk);

        $filesystem->put($path, $result->contents);

        return $path;
    }

    protected function resolveDriver(string $name): BarcodeDriver
    {
        $driverConfig = (array) config("barcode.drivers.{$name}", []);
        $driverType = (string) ($driverConfig['driver'] ?? $name);

        if (isset($this->customCreators[$driverType])) {
            return ($this->customCreators[$driverType])($name, $driverConfig);
        }

        $method = 'create'.ucfirst($driverType).'Driver';

        if (! method_exists($this, $method)) {
            throw new BarcodeException("Unsupported barcode driver [{$driverType}].");
        }

        return $this->{$method}($name, $driverConfig);
    }

    protected function getDefaultDriver(): string
    {
        return (string) config('barcode.default', 'svg');
    }

    protected function getDefaultOptions(): array
    {
        return (array) config('barcode.defaults', []);
    }

    protected function createSvgDriver(string $name, array $config): BarcodeDriver
    {
        return new Drivers\PicqerSvgDriver;
    }

    protected function createPngDriver(string $name, array $config): BarcodeDriver
    {
        return new Drivers\PicqerPngDriver;
    }

    protected function createHtmlDriver(string $name, array $config): BarcodeDriver
    {
        return new Drivers\PicqerHtmlDriver;
    }

    protected function createQrcodeDriver(string $name, array $config): BarcodeDriver
    {
        return new Drivers\BaconQrCodeDriver;
    }
}
