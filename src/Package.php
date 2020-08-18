<?php

namespace Webkul\PackageGenerator;

use Illuminate\Filesystem\Filesystem;

class Package
{
    /**
     * The constructor.
     * 
     * @param  \Illuminate\Filesystem\Filesystem  $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * Checks if package exist or not
     *
     * @param  strign  $package
     * @return boolean
     */
    public function has($package)
    {
        return $this->filesystem->isDirectory(base_path('packages/' . $package));
    }

    /**
     * Deletes specific package
     *
     * @param  strign  $package
     * @return void
     */
    public function delete($package)
    {
        $this->filesystem->deleteDirectory(base_path('packages/' . $package));
    }
}