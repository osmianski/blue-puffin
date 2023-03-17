<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportHeroicons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'heroicons:import
        {src : Path to the `tailwindlabs/heroicons`}
        {dest : Path to the `osmianski/laravel-heroicons`}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports Heroicons from the original repository into Blade component library';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $src = $this->argument('src');
        $dest = $this->argument('dest');

        $this->convertDir("{$src}/src/20/solid", "{$dest}/resources/views/components/mini");
        $this->convertDir("{$src}/src/24/solid", "{$dest}/resources/views/components/solid");
        $this->convertDir("{$src}/src/24/outline", "{$dest}/resources/views/components/outline");
    }

    protected function convertDir(string $src, string $dest): void
    {
        if (!is_dir($dest)) {
            mkdir($dest, 0755, true);
        }
        $this->deleteFiles($dest);

        foreach (new \DirectoryIterator($src) as $fileInfo) {
            /* @var \SplFileInfo $fileInfo */
            if ($fileInfo->isDot()) {
                continue;
            }

            $ext = pathinfo($fileInfo->getFilename(), PATHINFO_EXTENSION);
            if ($ext !== 'svg') {
                continue;
            }

            $name = pathinfo($fileInfo->getFilename(), PATHINFO_FILENAME);
            $this->convertFile("{$src}/{$name}.svg", "{$dest}/{$name}.blade.php");
        }
    }

    protected function deleteFiles(string $path): void
    {
        foreach (new \DirectoryIterator($path) as $fileInfo) {
            /* @var \SplFileInfo $fileInfo */
            if ($fileInfo->isDot()) {
                continue;
            }

            unlink($fileInfo->getPathname());
        }
    }

    protected function convertFile(string $src, string $dest, bool $solid): void
    {
        $contents = file_get_contents($src);

        if ($solid) {
            $contents = preg_replace('/fill="[^"]+"/', 'fill="currentColor"', $contents);
        }
        else {
            $contents = str_replace('<svg ', '<svg stroke="currentColor" ', $contents);
        }

        $contents = str_replace('<svg ', '<svg {{ $attributes }} ', $contents);

        file_put_contents($dest, $contents);
    }
}
