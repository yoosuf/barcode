<?php

namespace Yoosuf\Barcode\Console;

use Illuminate\Console\Command;
use Yoosuf\Barcode\BarcodeManager;

class GenerateBarcodeCommand extends Command
{
    protected $signature = 'barcode:generate
        {value : The barcode payload to encode}
        {--driver= : The barcode driver to use (svg, png, html)}
        {--type=TYPE_CODE_128 : The barcode type constant to encode}
        {--width=2 : The width factor for 1D drivers}
        {--height=60 : The height for 1D drivers}
        {--output= : The output path to save the generated barcode}
        {--disk= : The filesystem disk to use when saving}';

    protected $description = 'Generate a barcode from the command line';

    public function handle(BarcodeManager $barcode): int
    {
        $value = (string) $this->argument('value');
        $driver = $this->option('driver') ?: null;
        $options = [
            'type' => (string) $this->option('type'),
            'width' => (int) $this->option('width'),
            'height' => (int) $this->option('height'),
        ];

        $outputPath = $this->option('output');

        if (is_string($outputPath) && $outputPath !== '') {
            $savedPath = $barcode->save(
                $outputPath,
                $value,
                $driver,
                $options,
                $this->option('disk') ?: null
            );

            $this->info("Barcode saved to {$savedPath}");

            return self::SUCCESS;
        }

        $result = $barcode->render($value, $driver, $options);

        if (! in_array($result->mimeType, ['image/svg+xml', 'text/html'], true)) {
            $this->error('Binary barcode output requires the --output option.');

            return self::FAILURE;
        }

        $this->line($result->contents);

        return self::SUCCESS;
    }
}