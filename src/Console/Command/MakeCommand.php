<?php

namespace Webkul\PackageGenerator\Console\Command;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Webkul\PackageGenerator\Generators\PackageGenerator;

class MakeCommand extends Command
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected Filesystem $filesystem,
        protected PackageGenerator $packageGenerator
    )
    {
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
     * Get name in Lower case.
     * 
     * @return string
     */
    protected function getLowerName()
    {
        return strtolower(class_basename($this->argument('package')));
    }

    /**
     * Get class name.
     * 
     * @return string
     */
    protected function getClassName()
    {
        return class_basename($this->argument('name'));
    }

    /**
     * Get namespace for controller.
     * 
     * @return string
     */
    protected function getClassNamespace(string $name)
    {
        return str_replace('/', '\\', $name);
    }

    /**
     * Get controller name.
     * 
     * @return string
     */
    protected function getClassControllerName()
    {
        return $this->getStudlyName() . 'Controller';
    }
}
