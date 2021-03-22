<?php

namespace Webkul\PackageGenerator\Console\Command;

use Illuminate\Support\Str;
use Webkul\PackageGenerator\Generators\PackageGenerator;

class ShopThemeMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:make-shop-theme {key} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new theme for shop.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        $sourceFilePath = $this->getSourceFilePath();

        $themeContent = include $sourceFilePath;

        $themeKey = $this->argument('key');

        $themeContent['themes'][$themeKey] = [
            'views_path'    => "resources/themes/$themeKey/views",
            'assets_path'   => "public/themes/$themeKey/assets",
            'name'          => ucfirst($this->argument('key')),
            'parent'        => 'default'
        ];

        $themeContent = $this->varexport($themeContent);

        $this->createMaster($themeKey);

        return "<?php\n \nreturn {$themeContent};\n?>";
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('config/');

        return $path . 'themes.php';
    }

    public function varexport($expression)
    {
        $export = var_export($expression, TRUE);
        $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
        $array = preg_split("/\r\n|\n|\r/", $export);
        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [NULL, ']$1', ' => ['], $array);
        $export = join(PHP_EOL, array_filter(["["] + $array));

        return print_r($export, true);
    }

    public function createMaster($themeKey)
    {
        $layoutsPath = base_path('resources/themes/' . $themeKey . '/views/layouts');

        if (! $this->filesystem->isDirectory($dir = $layoutsPath)) {
            $this->filesystem->makeDirectory($dir, 0775, true);
        }

        $this->filesystem->put($layoutsPath . '/master.blade.php', $this->packageGenerator->getStubContents("theme-master", [
            "THEME_KEY" => ucfirst($themeKey)
        ]));
    }
}