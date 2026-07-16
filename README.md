# yoosuf/barcode

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.1%2B-777bb4.svg)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-10%20%7C%2011%20%7C%2012-ff2d20.svg)](https://laravel.com/)

Production-ready Laravel barcode and QR code package with pluggable drivers, filesystem support, and API-friendly outputs.

## Why This Package

- Laravel-native integration with auto-discovery, facade, and config publishing.
- Stable manager and driver contract for long-term compatibility.
- Multiple output modes suitable for APIs, Blade views, jobs, and document pipelines.
- Easy custom driver extension without touching package internals.
- Works with modern Laravel versions while preserving simple integration points.

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

`Production-ready Laravel barcode and QR code package with pluggable drivers, filesystem support, and API-friendly outputs.`

Recommended GitHub topics:

- `laravel`
- `laravel-package`
- `barcode`
- `qr-code`
- `php`
- `code128`
- `ean13`
- `upc`
- `svg`
- `png`
- `api`
- `filesystem`

## License

MIT
