# API Reference

## Facade

Namespace: `Yoosuf\Barcode\Facades\Barcode`

### render

- Signature: `render(string $value, ?string $driver = null, array $options = []): BarcodeResult`
- Description: Generates barcode/QR content using resolved driver.

### dataUri

- Signature: `dataUri(string $value, ?string $driver = null, array $options = []): string`
- Description: Returns RFC-compliant Data URI for direct embedding.

### save

- Signature: `save(string $path, string $value, ?string $driver = null, array $options = [], ?string $disk = null): string`
- Description: Generates and writes barcode content to Laravel filesystem.
- Return: Relative storage path.

### driver

- Signature: `driver(?string $name = null): Contracts\BarcodeDriver`
- Description: Returns resolved concrete driver instance.

### extend

- Signature: `extend(string $driver, Closure $creator): self`
- Description: Registers custom driver resolver.

## BarcodeResult

Namespace: `Yoosuf\Barcode\Support\BarcodeResult`

### Properties

- `contents` (string): Raw generated payload.
- `mimeType` (string): Response mime type.
- `extension` (string): Recommended file extension.

### Methods

- `dataUri(): string`

## Driver Contract

Namespace: `Yoosuf\Barcode\Contracts\BarcodeDriver`

- Signature: `render(string $value, array $options = []): BarcodeResult`

## Built-In Driver Names

- `svg`
- `png`
- `html`
- `qrcode`

## Common Render Options

### Shared for 1D Drivers

- `type` (default: `TYPE_CODE_128`)
- `width` (default: 2)
- `height` (default: 60)

### QR Driver

- `size` (default: 300)
- `margin` (default: 10)
