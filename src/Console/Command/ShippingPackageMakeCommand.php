<?php

namespace Webkul\PackageGenerator\Console\Command;

class ShippingPackageMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:make-shipping-method {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new shipping method.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->packageGenerator->setConsole($this)
            ->setPackage($this->argument('package'))
            ->setType('shipping')
            ->setForce($this->option('force'))
            ->generate();
    }
}
