<?php

namespace Webkul\PackageGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\PackageGenerator\Console\Command\PackageMakeCommand;
use Webkul\PackageGenerator\Console\Command\ProviderMakeCommand;
use Webkul\PackageGenerator\Console\Command\ModuleProviderMakeCommand;
use Webkul\PackageGenerator\Console\Command\AdminControllerMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShopControllerMakeCommand;
use Webkul\PackageGenerator\Console\Command\AdminRouteMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShopRouteMakeCommand;
use Webkul\PackageGenerator\Console\Command\MigrationMakeCommand;
use Webkul\PackageGenerator\Console\Command\ModelMakeCommand;
use Webkul\PackageGenerator\Console\Command\ModelProxyMakeCommand;
use Webkul\PackageGenerator\Console\Command\ModelContractMakeCommand;
use Webkul\PackageGenerator\Console\Command\RepositoryMakeCommand;
use Webkul\PackageGenerator\Console\Command\SeederMakeCommand;
use Webkul\PackageGenerator\Console\Command\MailMakeCommand;
use Webkul\PackageGenerator\Console\Command\CommandMakeCommand;
use Webkul\PackageGenerator\Console\Command\EventMakeCommand;
use Webkul\PackageGenerator\Console\Command\ListenerMakeCommand;
use Webkul\PackageGenerator\Console\Command\MiddlewareMakeCommand;
use Webkul\PackageGenerator\Console\Command\RequestMakeCommand;
use Webkul\PackageGenerator\Console\Command\NotificationMakeCommand;
use Webkul\PackageGenerator\Console\Command\DatagridMakeCommand;
use Webkul\PackageGenerator\Console\Command\PaymentPackageMakeCommand;
use Webkul\PackageGenerator\Console\Command\PaymentMethodProviderMakeCommand;
use Webkul\PackageGenerator\Console\Command\PaymentMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShippingPackageMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShippingMethodProviderMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShippingMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShopThemeMakeCommand;
use Webkul\PackageGenerator\Console\Command\AdminThemeMakeCommand;

class PackageGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerCommands();
    }

    /**
     * Register the console commands of this package
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PackageMakeCommand::class,
                ProviderMakeCommand::class,
                ModuleProviderMakeCommand::class,
                AdminControllerMakeCommand::class,
                ShopControllerMakeCommand::class,
                AdminRouteMakeCommand::class,
                ShopRouteMakeCommand::class,
                MigrationMakeCommand::class,
                ModelMakeCommand::class,
                ModelProxyMakeCommand::class,
                ModelContractMakeCommand::class,
                RepositoryMakeCommand::class,
                SeederMakeCommand::class,
                MailMakeCommand::class,
                CommandMakeCommand::class,
                EventMakeCommand::class,
                ListenerMakeCommand::class,
                MiddlewareMakeCommand::class,
                RequestMakeCommand::class,
                NotificationMakeCommand::class,
                DatagridMakeCommand::class,
                PaymentPackageMakeCommand::class,
                PaymentMethodProviderMakeCommand::class,
                PaymentMakeCommand::class,
                ShippingPackageMakeCommand::class,
                ShippingMethodProviderMakeCommand::class,
                ShippingMakeCommand::class,
                ShopThemeMakeCommand::class,
                AdminThemeMakeCommand::class,
            ]);
        }
    }
}