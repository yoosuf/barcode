# Configuration

Config file: `config/barcode.php`

## Top-Level Keys

- `default`
  - Default driver name used by manager.
- `defaults`
  - Global options merged into each render call.
- `drivers`
  - Driver map with per-driver settings.

## Environment Variables

- `BARCODE_DRIVER`
- `BARCODE_TYPE`
- `BARCODE_WIDTH_FACTOR`
- `BARCODE_HEIGHT`
- `BARCODE_FOREGROUND_COLOR`
- `BARCODE_QR_SIZE`
- `BARCODE_QR_MARGIN`

## Merge Precedence

Options are merged in this order (later wins):

1. `barcode.defaults`
2. `barcode.drivers.<driver>`
3. runtime `options` argument

## Example

```php
return [
    'default' => env('BARCODE_DRIVER', 'svg'),
    'defaults' => [
        'type' => env('BARCODE_TYPE', 'TYPE_CODE_128'),
        'width' => (int) env('BARCODE_WIDTH_FACTOR', 2),
        'height' => (int) env('BARCODE_HEIGHT', 60),
    ],
    'drivers' => [
        'svg' => ['driver' => 'svg'],
        'png' => ['driver' => 'png'],
        'html' => ['driver' => 'html'],
        'qrcode' => [
            'driver' => 'qrcode',
            'size' => (int) env('BARCODE_QR_SIZE', 300),
            'margin' => (int) env('BARCODE_QR_MARGIN', 10),
        ],
    ],
];
```
