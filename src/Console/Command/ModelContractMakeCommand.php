<?php

namespace Webkul\PackageGenerator\Console\Command;

class ModelContractMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:make-model-contract {name} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model contract.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('model-contract', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace($this->argument('package') . '/Contracts'),
            'CLASS'     => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/' . $this->argument('package')) . '/src/Contracts';

        return $path . '/' . $this->getClassName() . '.php';
    }
    
}