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
            'views/shop/default/index'                   => 'Resources/views/shop/default/index.blade.php',
            'views/shop/velocity/index'                  => 'Resources/views/shop/velocity/index.blade.php',
            'scaffold/admin-menu'                        => 'Config/admin-menu.php',
            'scaffold/acl'                               => 'Config/acl.php',
            'assets/js/app'                              => 'Resources/assets/js/app.js',
            'assets/sass/admin'                          => 'Resources/assets/sass/admin.scss',
            'assets/sass/default'                        => 'Resources/assets/sass/default.scss',
            'assets/sass/velocity'                       => 'Resources/assets/sass/velocity.scss',
            'assets/images/Icon-Temp'                    => 'Resources/assets/images/Icon-Temp.svg',
            'assets/images/Icon-Temp-Active'             => 'Resources/assets/images/Icon-Temp-Active.svg',
            'assets/publishable/css/admin'               => '../publishable/assets/css/admin.css',
            'assets/publishable/css/default'             => '../publishable/assets/css/default.css',
            'assets/publishable/css/velocity'            => '../publishable/assets/css/velocity.css',
            'assets/publishable/js/app'                  => '../publishable/assets/js/app.js',
            'assets/publishable/images/Icon-Temp'        => '../publishable/assets/images/Icon-Temp.svg',
            'assets/publishable/images/Icon-Temp-Active' => '../publishable/assets/images/Icon-Temp-Active.svg',
            'webpack'                                    => '../webpack.mix.js',
            'package'                                    => '../package.json',
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
     */
    public function __construct(
        protected Config $config,
        protected Command $console,
        protected Filesystem $filesystem,
        protected Package $package
    ) {
    }

    /**
     * Set console
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
     * @param  string  $packageName
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setPackage($packageName)
    {
        $this->packageName = $packageName;

        return $this;
    }

    /**
     * Set package plain.
     *
     * @param  string  $plain
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setPlain($plain)
    {
        $this->plain = $plain;

        return $this;
    }

    /**
     * Set force status.
     *
     * @param  bool  $force
     * @return \Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setForce($force)
    {
        $this->force = $force;

        return $this;
    }

    /**
     * Set type status.
     *
     * @param  bool  $isPaymentPackage
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
     * Generate package
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
     * Generate package folders
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
     * Generate package files
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
     * Generate package classes
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
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'LOWER_NAME'      => $this->getLowerName(),
            'CAPITALIZE_NAME' => $this->getCapitalizeName(),
            'PACKAGE'         => $this->getClassNamespace($this->packageName),
            'CLASS'           => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getClassName()
    {
        return class_basename($this->packageName);
    }

    /**
     * @return string
     */
    protected function getClassNamespace(string $name)
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
     * @return string
     */
    protected function getCapitalizeName()
    {
        return ucwords(class_basename($this->packageName));
    }

    /**
     * @return string
     */
    protected function getLowerName()
    {
        return strtolower(class_basename($this->packageName));
    }
}
