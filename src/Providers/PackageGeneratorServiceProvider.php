<?php

namespace Webkul\PackageGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\PackageGenerator\Console\Command\AdminControllerMakeCommand;
use Webkul\PackageGenerator\Console\Command\AdminRouteMakeCommand;
use Webkul\PackageGenerator\Console\Command\AdminThemeMakeCommand;
use Webkul\PackageGenerator\Console\Command\CommandMakeCommand;
use Webkul\PackageGenerator\Console\Command\DatagridMakeCommand;
use Webkul\PackageGenerator\Console\Command\EventMakeCommand;
use Webkul\PackageGenerator\Console\Command\ListenerMakeCommand;
use Webkul\PackageGenerator\Console\Command\MailMakeCommand;
use Webkul\PackageGenerator\Console\Command\MiddlewareMakeCommand;
use Webkul\PackageGenerator\Console\Command\MigrationMakeCommand;
use Webkul\PackageGenerator\Console\Command\ModelContractMakeCommand;
use Webkul\PackageGenerator\Console\Command\ModelMakeCommand;
use Webkul\PackageGenerator\Console\Command\ModelProxyMakeCommand;
use Webkul\PackageGenerator\Console\Command\ModuleProviderMakeCommand;
use Webkul\PackageGenerator\Console\Command\NotificationMakeCommand;
use Webkul\PackageGenerator\Console\Command\PackageMakeCommand;
use Webkul\PackageGenerator\Console\Command\PaymentMakeCommand;
use Webkul\PackageGenerator\Console\Command\PaymentMethodProviderMakeCommand;
use Webkul\PackageGenerator\Console\Command\PaymentPackageMakeCommand;
use Webkul\PackageGenerator\Console\Command\PostCssConfigMakeCommand;
use Webkul\PackageGenerator\Console\Command\ProviderMakeCommand;
use Webkul\PackageGenerator\Console\Command\RepositoryMakeCommand;
use Webkul\PackageGenerator\Console\Command\RequestMakeCommand;
use Webkul\PackageGenerator\Console\Command\SeederMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShippingMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShippingMethodProviderMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShippingPackageMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShopControllerMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShopRouteMakeCommand;
use Webkul\PackageGenerator\Console\Command\ShopThemeMakeCommand;
use Webkul\PackageGenerator\Console\Command\TailwindConfigMakeCommand;
use Webkul\PackageGenerator\Console\Command\ViteConfigMakeCommand;

class PackageGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerCommands();
    }

    /**
     * Register the console commands of this package
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AdminControllerMakeCommand::class,
                AdminRouteMakeCommand::class,
                AdminThemeMakeCommand::class,
                CommandMakeCommand::class,
                DatagridMakeCommand::class,
                EventMakeCommand::class,
                ListenerMakeCommand::class,
                MailMakeCommand::class,
                MiddlewareMakeCommand::class,
                MigrationMakeCommand::class,
                ModelContractMakeCommand::class,
                ModelMakeCommand::class,
                ModelProxyMakeCommand::class,
                ModuleProviderMakeCommand::class,
                NotificationMakeCommand::class,
                PackageMakeCommand::class,
                PaymentMakeCommand::class,
                PaymentMethodProviderMakeCommand::class,
                PaymentPackageMakeCommand::class,
                PostCssConfigMakeCommand::class,
                ProviderMakeCommand::class,
                RepositoryMakeCommand::class,
                RequestMakeCommand::class,
                SeederMakeCommand::class,
                ShippingMakeCommand::class,
                ShippingMethodProviderMakeCommand::class,
                ShippingPackageMakeCommand::class,
                ShopControllerMakeCommand::class,
                ShopRouteMakeCommand::class,
                ShopThemeMakeCommand::class,
                TailwindConfigMakeCommand::class,
                ViteConfigMakeCommand::class,
            ]);
        }
    }
}
