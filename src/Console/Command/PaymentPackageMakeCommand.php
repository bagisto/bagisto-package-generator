<?php

namespace Webkul\PackageGenerator\Console\Command;

class PaymentPackageMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:make-payment-method {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new payment method.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->packageGenerator->setConsole($this)
            ->setPackage($this->argument('package'))
            ->setType('payment')
            ->setForce($this->option('force'))
            ->generate();
    }
}
