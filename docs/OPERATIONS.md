# Operations

## Performance

- Reuse facade/manager calls in service layers.
- Use queue jobs for large batch generation.
- Prefer SVG for lightweight transport in APIs.

## Storage Patterns

- Persist generated assets with `save`.
- Use dedicated disks for public/private barcode assets.
- Store deterministic paths for cacheability.

## Security

- Validate and sanitize user-provided barcode values.
- Apply authorization before exposing barcode endpoints.
- Avoid returning sensitive payloads in public barcodes.

## Observability

- Log barcode generation failures with context.
- Track generation latency for high-throughput workloads.
- Capture driver and option metadata in error reports.

## Backward Compatibility Policy

- Public facade/manager method signatures are stable in 1.x.
- New drivers may be added without breaking existing APIs.
- Existing config keys are preserved; new keys are additive.
