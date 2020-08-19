<?php

namespace Webkul\PackageGenerator\Console\Command;

class ModelMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:make-model {name} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        parent::handle();

        $this->call('package:make-model-proxy', [
            'name'    => $this->argument('name') . 'Proxy',
            'package' => $this->argument('package'),
            '--force' => $this->option('force'),
        ]);

        $this->call('package:make-model-contract', [
            'name'    => $this->argument('name'),
            'package' => $this->argument('package'),
            '--force' => $this->option('force'),
        ]);
    }

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('model', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'PACKAGE'   => $this->getClassNamespace($this->argument('package')),
            'NAMESPACE' => $this->getClassNamespace($this->argument('package') . '/Models'),
            'CLASS'     => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/' . $this->argument('package')) . '/src/Models';

        return $path . '/' . $this->getClassName() . '.php';
    }
}