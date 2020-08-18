<?php

namespace Webkul\PackageGenerator\Console\Command;

use Webkul\PackageGenerator\Generators\PackageGenerator;

class PackageMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:make {package} {--plain}  {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new package.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->packageGenerator->setConsole($this)
            ->setPackage($this->argument('package'))
            ->setPlain($this->option('plain'))
            ->setForce($this->option('force'))
            ->generate();
    }
}