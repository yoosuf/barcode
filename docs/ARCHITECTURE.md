# Architecture

## Design Goals

- Laravel-first developer experience with auto-discovery and a facade.
- High compatibility across Laravel 10, 11, and 12.
- Pluggable driver architecture that allows custom generators.
- Predictable output contract for API/controller/job usage.

## High-Level Components

- `BarcodeServiceProvider`
  - Registers and configures package services.
  - Publishes package config.
- `BarcodeManager`
  - Central orchestration layer.
  - Resolves drivers, merges options, renders output, and persists files.
- `Contracts\BarcodeDriver`
  - Shared driver interface for all barcode generators.
- `Drivers\*`
  - Concrete implementations for SVG, PNG, HTML, and QR.
- `Support\BarcodeResult`
  - Output container with mime type and extension metadata.
- `Support\BarcodeType`
  - Shared barcode type constants.
- `Facades\Barcode`
  - Static-style access in Laravel apps.

## Runtime Flow

1. App code calls facade/helper/manager.
2. `BarcodeManager` chooses driver (explicit or default).
3. Manager merges global defaults, driver config, and runtime overrides.
4. Selected driver generates content and returns `BarcodeResult`.
5. Caller returns response, stores file, or embeds Data URI.

## Driver Resolution Model

- Driver name comes from:
  - explicit argument to `render`, `dataUri`, `save`, or
  - `barcode.default` config value.
- Driver type is resolved from `barcode.drivers.<name>.driver`.
- If a custom creator is registered through `extend`, it is used first.
- Otherwise the manager falls back to built-in driver factories.

## Extension Strategy

- Add custom engines via `BarcodeManager::extend(driver, creator)`.
- Custom drivers must implement `Contracts\BarcodeDriver`.
- Existing public APIs remain stable while new drivers can evolve independently.

## Architectural Constraints

- Drivers are stateless and instantiated on demand/cached by manager.
- Config values are source-of-truth for defaults.
- Consumers should rely on `BarcodeResult` instead of driver internals.

## Recommended Integration Boundaries

- Controllers: API image responses and download endpoints.
- Jobs: deferred generation and storage.
- Services: reuse business-level barcode generation workflows.
- Views: Data URI embedding for emails and print templates.
