# yoosuf/barcode

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.1%2B-777bb4.svg)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-10%20%7C%2011%20%7C%2012-ff2d20.svg)](https://laravel.com/)

Production-ready Laravel barcode package with pluggable drivers, filesystem support, and API-friendly outputs.

## Why This Package

- Laravel-native integration with auto-discovery, facade, and config publishing.
- Stable manager and driver contract for long-term compatibility.
- Multiple output modes suitable for APIs, Blade views, jobs, and document pipelines.
- Easy custom driver extension without touching package internals.
- Works with modern Laravel versions while preserving simple integration points.
- Supports standard 1D barcode symbologies through Picqer.

## Compatibility

- PHP: `^8.1`
- Laravel: `^10.0 | ^11.0 | ^12.0`

## Installation

```bash
composer require yoosuf/barcode
```

Optional: publish configuration.

```bash
php artisan vendor:publish --tag=barcode-config
```

## Quick Start

```php
use Yoosuf\Barcode\Facades\Barcode;

$svg = Barcode::render('SO-1001')->contents;

$dataUri = Barcode::dataUri('SO-1001', 'png', [
    'type' => 'TYPE_CODE_128',
    'width' => 2,
    'height' => 80,
]);

$storedPath = Barcode::save('barcodes/so-1001.svg', 'SO-1001', 'svg');
```

## CLI

Generate a barcode from Artisan and save it to disk:

```bash
php artisan barcode:generate SO-1001 --driver=svg --output=storage/app/barcodes/so-1001.svg
```

You can also print SVG or HTML output directly to the terminal:

```bash
php artisan barcode:generate SO-1001 --driver=svg
```

## Core Architecture

- `BarcodeServiceProvider`: package registration, config merge, and publish.
- `BarcodeManager`: driver resolution, option merge, rendering, persistence.
- `Contracts\BarcodeDriver`: unified contract for all drivers.
- `Drivers\*`: built-in engine implementations.
- `Support\BarcodeResult`: output payload + metadata.

For complete details, see the architecture guide.

## Documentation Index

- Architecture: [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md)
- API Reference: [docs/API.md](docs/API.md)
- Configuration: [docs/CONFIGURATION.md](docs/CONFIGURATION.md)
- Usage Guide: [docs/USAGE.md](docs/USAGE.md)
- Extending Drivers: [docs/EXTENDING.md](docs/EXTENDING.md)
- Operations: [docs/OPERATIONS.md](docs/OPERATIONS.md)
- Contributing: [CONTRIBUTING.md](CONTRIBUTING.md)
- Changelog: [CHANGELOG.md](CHANGELOG.md)

## GitHub Repository Metadata

Use this description for the GitHub repository:

`Production-ready Laravel barcode package with pluggable drivers, filesystem support, and API-friendly outputs.`

Recommended GitHub topics:

- `laravel`
- `laravel-package`
- `barcode`
- `php`
- `code128`
- `ean13`
- `upc`
- `code39`
- `code93`
- `itf14`
- `msi`
- `svg`
- `png`
- `api`
- `filesystem`

## Supported Barcode Types

The package exposes the full 1D symbology set supported by Picqer:

- `TYPE_CODE_32`
- `TYPE_CODE_39`
- `TYPE_CODE_39_CHECKSUM`
- `TYPE_CODE_39E`
- `TYPE_CODE_39E_CHECKSUM`
- `TYPE_CODE_93`
- `TYPE_STANDARD_2_5`
- `TYPE_STANDARD_2_5_CHECKSUM`
- `TYPE_INTERLEAVED_2_5`
- `TYPE_INTERLEAVED_2_5_CHECKSUM`
- `TYPE_ITF_14`
- `TYPE_CODE_128`
- `TYPE_CODE_128_A`
- `TYPE_CODE_128_B`
- `TYPE_CODE_128_C`
- `TYPE_EAN_2`
- `TYPE_EAN_5`
- `TYPE_EAN_8`
- `TYPE_EAN_13`
- `TYPE_UPC_A`
- `TYPE_UPC_E`
- `TYPE_MSI`
- `TYPE_MSI_CHECKSUM`
- `TYPE_POSTNET`
- `TYPE_PLANET`
- `TYPE_TELEPEN_ALPHA`
- `TYPE_TELEPEN_NUMERIC`
- `TYPE_RMS4CC`
- `TYPE_KIX`
- `TYPE_IMB`
- `TYPE_CODABAR`
- `TYPE_CODE_11`
- `TYPE_PHARMA_CODE`
- `TYPE_PHARMA_CODE_TWO_TRACKS`

## License

MIT

