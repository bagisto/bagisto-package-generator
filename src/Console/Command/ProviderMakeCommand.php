<?php

namespace Webkul\PackageGenerator\Console\Command;

use Illuminate\Support\Str;
use Webkul\PackageGenerator\Generators\PackageGenerator;

class ProviderMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:make-provider {name} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service provider.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        $stub = $this->hasOption('plain') ? 'provider' : 'scaffold/package-provider';

        return $this->packageGenerator->getStubContents($stub, $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE'  => $this->getClassNamespace($this->argument('package') . '/Providers'),
            'CLASS'      => $this->getClassName(),
            'LOWER_NAME' => $this->getLowerName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/' . $this->argument('package')) . '/src/Providers';

        return $path . '/' . $this->getClassName() . '.php';
    }
}