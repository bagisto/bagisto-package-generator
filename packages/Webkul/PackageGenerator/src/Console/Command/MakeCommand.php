<?php

namespace Webkul\PackageGenerator\Console\Command;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Webkul\PackageGenerator\Generators\PackageGenerator;

class MakeCommand extends Command
{
    /**
     * Filesystem object
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * PackageGenerator object
     *
     * @var \Webkul\PackageGenerator\Generators\PackageGenerator
     */
    protected $packageGenerator;

    /**
     * Create a new command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $filesystem
     * @param  \Webkul\PackageGenerator\Generators\PackageGenerator  $packageGenerator
     * @return void
     */
    public function __construct(
        Filesystem  $filesystem,
        PackageGenerator $packageGenerator
    )
    {
        $this->filesystem = $filesystem;

        $this->packageGenerator = $packageGenerator;

        parent::__construct();
    }
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();

        if (! $this->filesystem->isDirectory($dir = dirname($path))) {
            $this->filesystem->makeDirectory($dir, 0777, true);
        }

        $contents = $this->getStubContents();

        if (! $this->filesystem->exists($path)) {
            $this->filesystem->put($path, $contents);
        } else {
            if ($this->option('force')) {
                $this->filesystem->put($path, $contents);
            } else {
                $this->error("File : {$path} already exists.");

                return;
            }
        }

        $this->info("File Created : {$path}");
    }

    /**
     * Get name in studly case.
     *
     * @return string
     */
    public function getStudlyName()
    {
        return class_basename($this->argument('package'));
    }

    /**
     * @return string
     */
    protected function getLowerName()
    {
        return strtolower(class_basename($this->argument('package')));
    }

    /**
     * @return string
     */
    protected function getClassName()
    {
        return class_basename($this->argument('name'));
    }

    /**
     * @param  string  $name
     * @return string
     */
    protected function getClassNamespace($name)
    {
        return str_replace('/', '\\', $name);
    }
}