# Usage Guide

## In Controllers

```php
use Yoosuf\Barcode\Facades\Barcode;

public function show(string $id)
{
    $result = Barcode::render($id, 'svg');

    return response($result->contents)
        ->header('Content-Type', $result->mimeType);
}
```

## In Jobs

```php
use Yoosuf\Barcode\Facades\Barcode;

public function handle(): void
{
    Barcode::save('barcodes/order-1001.svg', 'ORDER-1001', 'svg', [], 'public');
}
```

## In Blade Views

```php
<img src="{{ Barcode::dataUri($order->number, 'png') }}" alt="Order barcode">
```

## Return Download

```php
use Yoosuf\Barcode\Facades\Barcode;

$result = Barcode::render('SO-1001', 'png');

return response($result->contents)
    ->header('Content-Type', $result->mimeType)
    ->header('Content-Disposition', 'attachment; filename="so-1001.'.$result->extension.'"');
```

## QR Example

```php
$qr = Barcode::render('https://example.com/orders/SO-1001', 'qrcode', [
    'size' => 320,
    'margin' => 8,
]);
```

## Error Handling

```php
use Yoosuf\Barcode\Exceptions\BarcodeException;

try {
    $result = Barcode::render($payload, 'svg');
} catch (BarcodeException $e) {
    report($e);
    abort(422, 'Barcode generation failed');
}
```
