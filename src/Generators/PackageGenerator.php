<?php

namespace Webkul\PackageGenerator\Generators;

use Illuminate\Config\Repository as Config;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Webkul\PackageGenerator\Package;

class PackageGenerator
{
    /**
     * The package vendor namespace
     *
     * @var string
     */
    protected $vendorNamespace;

    /**
     * The package name
     *
     * @var string
     */
    protected $packageName;

    /**
     * @var bool
     */
    protected $plain;

    /**
     * @var bool
     */
    protected $force;

    /**
     * @var bool
     */
    protected $type = 'package';

    /**
     * Contains subs files information
     *
     * @var string
     */
    protected $stubFiles = [
        'package'  => [
            'views/admin/layouts/style'                  => 'Resources/views/admin/layouts/style.blade.php',
            'views/admin/index'                          => 'Resources/views/admin/index.blade.php',
            'views/shop/index'                           => 'Resources/views/shop/index.blade.php',
            'scaffold/admin-menu'                        => 'Config/admin-menu.php',
            'scaffold/acl'                               => 'Config/acl.php',
            'assets/js/app'                              => 'Resources/assets/js/app.js',
            'assets/css/app'                             => 'Resources/assets/css/app.css',
            'assets/images/icon-temp'                    => 'Resources/assets/images/icon-temp.svg',
            'assets/images/icon-temp-active'             => 'Resources/assets/images/icon-temp-active.svg',
            'package'                                    => '../package.json',
            'postcss-config'                             => '../postcss.config.js',
            'tailwind-config'                            => '../tailwind.config.js',
            'vite-config'                                => '../vite.config.js',
        ],

        'payment'  => [
            'scaffold/paymentmethods'        => 'Config/paymentmethods.php',
            'scaffold/payment-method-system' => 'Config/system.php',
        ],

        'shipping' => [
            'scaffold/carriers'               => 'Config/carriers.php',
            'scaffold/shipping-method-system' => 'Config/system.php',
        ],
    ];

    /**
     * Contains package file paths for creation
     *
     * @var array
     */
    protected $paths = [
        'package'  => [
            'config'     => 'Config',
            'command'    => 'Console/Commands',
            'migration'  => 'Database/Migrations',
            'seeder'     => 'Database/Seeders',
            'contracts'  => 'Contracts',
            'model'      => 'Models',
            'routes'     => 'Http',
            'controller' => 'Http/Controllers',
            'filter'     => 'Http/Middleware',
            'request'    => 'Http/Requests',
            'provider'   => 'Providers',
            'repository' => 'Repositories',
            'event'      => 'Events',
            'listener'   => 'Listeners',
            'emails'     => 'Mail',
            'assets'     => 'Resources/assets',
            'lang'       => 'Resources/lang',
            'views'      => 'Resources/views',
        ],

        'payment'  => [
            'config'   => 'Config',
            'payment'  => 'Payment',
            'provider' => 'Providers',
        ],

        'shipping' => [
            'config'   => 'Config',
            'carriers' => 'Carriers',
            'provider' => 'Providers',
        ],
    ];

    /**
     * The constructor.
     * 
     * @return void
     */
    public function __construct(
        protected Config $config,
        protected Command $console,
        protected Filesystem $filesystem,
        protected Package $package
    )
    {
    }

    /**
     * Set console.
     *
     * @param  \Illuminate\Console\Command  $console
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setConsole($console)
    {
        $this->console = $console;

        return $this;
    }

    /**
     * Set package.
     *
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setPackage(string $packageName)
    {
        $this->packageName = $packageName;

        return $this;
    }

    /**
     * Set package plain.
     *
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setPlain(string $plain)
    {
        $this->plain = $plain;

        return $this;
    }

    /**
     * Set force status.
     *
     * @return \Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setForce(bool $force)
    {
        $this->force = $force;

        return $this;
    }

    /**
     * Set type status.
     *
     * @param  bool  $type
     * @return \Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set isShippingPackage status.
     *
     * @param  bool  $isShippingPackage
     * @return \Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setIsShippingPackage($isShippingPackage)
    {
        $this->isShippingPackage = $isShippingPackage;

        return $this;
    }

    /**
     * Generate package.
     *
     * @return void
     */
    public function generate()
    {
        if ($this->package->has($this->packageName)) {
            if ($this->force) {
                $this->package->delete($this->packageName);
            } else {
                $this->console->error("Package '{$this->packageName}' already exist !");

                return;
            }
        }

        $this->createFolders();

        if (! $this->plain) {
            $this->createFiles();

            $this->createClasses();
        }

        $this->console->info("Package '{$this->packageName}' created successfully.");
    }

    /**
     * Generate package folders.
     *
     * @return void
     */
    public function createFolders()
    {
        foreach ($this->paths[$this->type] as $key => $folder) {
            $path = base_path('packages/' . $this->packageName . '/src') . '/' . $folder;

            $this->filesystem->makeDirectory($path, 0755, true);
        }
    }

    /**
     * Generate package files.
     *
     * @return void
     */
    public function createFiles()
    {
        $variables = $this->getStubVariables();

        foreach ($this->stubFiles[$this->type] as $stub => $file) {
            $path = base_path('packages/' . $this->packageName . '/src') . '/' . $file;

            if (! $this->filesystem->isDirectory($dir = dirname($path))) {
                $this->filesystem->makeDirectory($dir, 0775, true);
            }

            $this->filesystem->put($path, $this->getStubContents($stub, $variables));

            $this->console->info("Created file : {$path}");
        }
    }

    /**
     * Generate package classes.
     *
     * @return void
     */
    public function createClasses()
    {
        $commands = [
            'package' => [
                'package:make-provider' => [
                    'name' => $this->packageName . 'ServiceProvider',
                    'package' => $this->packageName
                ],

                'package:make-module-provider' => [
                    'name' => 'ModuleServiceProvider',
                    'package' => $this->packageName
                ],

                'package:make-admin-controller' => [
                    'name' => $this->packageName . 'Controller',
                    'package' => $this->packageName
                ],

                'package:make-shop-controller' => [
                    'name' => $this->packageName . 'Controller',
                    'package' => $this->packageName
                ],

                'package:make-admin-route' => [
                    'package' => $this->packageName
                ],

                'package:make-shop-route' => [
                    'package' => $this->packageName
                ],
            ],

            'payment' => [
                'package:make-payment-method-provider' => [
                    'name' => $this->packageName . 'ServiceProvider',
                    'package' => $this->packageName
                ],

                'package:make-payment' => [
                    'name' => $this->packageName,
                    'package' => $this->packageName
                ],
            ],

            'shipping' => [
                'package:make-shipping-method-provider' => [
                    'name' => $this->packageName . 'ServiceProvider',
                    'package' => $this->packageName
                ],

                'package:make-shipping' => [
                    'name' => $this->packageName,
                    'package' => $this->packageName
                ],
            ],
        ];

        if (array_key_exists($this->type, $commands)) {
            foreach ($commands[$this->type] as $command => $arguments) {
                $this->console->call($command, $arguments);
            }
        }
    }

    /**
     * Returns Stub variables.
     */
    protected function getStubVariables(): array
    {
        return [
            'LOWER_NAME'      => $this->getLowerName(),
            'CAPITALIZE_NAME' => $this->getCapitalizeName(),
            'PACKAGE'         => $this->getClassNamespace($this->packageName),
            'CLASS'           => $this->getClassName(),
        ];
    }

    /**
     * Returns class name.
     */
    protected function getClassName(): string
    {
        return class_basename($this->packageName);
    }

    /**
     * Returns class Namespace.
     */
    protected function getClassNamespace(string $name) : string
    {
        return str_replace('/', '\\', $name);
    }

    /**
     * Returns content of stub file.
     *
     * @return string
     */
    public function getStubContents(string $stub, array $variables = [])
    {
        $contents = file_get_contents(__DIR__ . '/../stubs/' . $stub . '.stub');

        foreach ($variables as $search => $replace) {
            $contents = str_replace('$' . strtoupper($search) . '$', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Returns name in capital letter.
     */
    protected function getCapitalizeName(): string
    {
        return ucwords(class_basename($this->packageName));
    }

    /**
     * Returns name in small letter.
     */
    protected function getLowerName() : string
    {
        return strtolower(class_basename($this->packageName));
    }
}
