# Extending With Custom Drivers

## 1. Create a Driver

```php
namespace App\Barcode;

use Yoosuf\Barcode\Contracts\BarcodeDriver;
use Yoosuf\Barcode\Support\BarcodeResult;

class CustomDriver implements BarcodeDriver
{
    public function render(string $value, array $options = []): BarcodeResult
    {
        $contents = '<svg><!-- custom output --></svg>';

        return new BarcodeResult($contents, 'image/svg+xml', 'svg');
    }
}
```

## 2. Register Driver Resolver

```php
use Yoosuf\Barcode\BarcodeManager;

app(BarcodeManager::class)->extend('custom-engine', function (string $name, array $config) {
    return new \App\Barcode\CustomDriver();
});
```

## 3. Configure Alias Name

```php
// config/barcode.php
'default' => 'custom',
'drivers' => [
    'custom' => ['driver' => 'custom-engine'],
],
```

## Guidelines For Compatibility

- Implement only contract-level behavior.
- Return accurate `mimeType` and `extension`.
- Keep drivers stateless and deterministic.
- Validate option values early and fail with explicit exceptions.
