<?php

namespace Webkul\PackageGenerator;

use Illuminate\Filesystem\Filesystem;

class Package
{
    /**
     * The constructor.
     *
     * @return void
     */
    public function __construct(protected Filesystem $filesystem)
    {
    }

    /**
     * Checks if package exist or not
     *
     * @return bool
     */
    public function has(string $package)
    {
        return $this->filesystem->isDirectory(base_path('packages/' . $package));
    }

    /**
     * Deletes specific package
     *
     * @return void
     */
    public function delete(string $package)
    {
        $this->filesystem->deleteDirectory(base_path('packages/' . $package));
    }
}
