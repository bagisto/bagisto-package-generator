<?php

namespace Webkul\PackageGenerator\Console\Command;

class AdminRouteMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:make-admin-route {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin route file.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('admin-routes', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'CONTROLLER_CLASS_NAME' => $this->getClassNamespace($this->argument('package') . '/Http/Controllers/Admin/' . $this->getStudlyName() . 'Controller'),
            'CLASS'                 => $this->getClassControllerName(),
            'LOWER_NAME'            => $this->getLowerName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        return base_path('packages/' . $this->argument('package')) . '/src/Routes' . '/admin-routes.php';
    }
}
