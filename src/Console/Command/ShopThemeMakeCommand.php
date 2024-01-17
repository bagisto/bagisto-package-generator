<?php

namespace Webkul\PackageGenerator\Console\Command;

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
     * Return Stub file contents.
     * 
     * @return mixed
     */
    protected function getStubContents()
    {
        $sourceFilePath = $this->getSourceFilePath();

        $themeContent = include $sourceFilePath;

        $themeKey = $this->argument('key');

        $themeContent['shop'][$themeKey] = [
            'name'          => ucfirst($this->argument('key')),
            'assets_path'   => "public/themes/shop/$themeKey",
            'views_path'    => "resources/themes/shop/$themeKey/views",

            'vite'        => [
                'hot_file'                 => "shop-$themeKey-vite.hot",
                'build_directory'          => "themes/shop/$themeKey/build",
                'package_assets_directory' => 'src/Resources/assets',
            ],
        ];

        $themeContent = $this->varexport($themeContent);

        $this->createMaster($themeKey);

        return "<?php\n \nreturn {$themeContent};";
    }

    /**
     * Return source file path.
     * 
     * @return string
     */
    protected function getSourceFilePath()
    {
        return base_path('config/') . 'themes.php';
    }

    public function varexport($expression)
    {
        $export = var_export($expression, TRUE);

        $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);

        $array = preg_split("/\r\n|\n|\r/", $export);

        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [NULL, ']$1', ' => ['], $array);

        $export = implode(PHP_EOL, array_filter(['['] + $array));

        return print_r($export, true);
    }

    public function createMaster($themeKey)
    {
        $layoutsPath = base_path('resources/themes/shop/' . $themeKey . '/views/home');

        if (! $this->filesystem->isDirectory($dir = $layoutsPath)) {
            $this->filesystem->makeDirectory($dir, 0775, true);
        }

        $this->filesystem->put($layoutsPath . '/index.blade.php', $this->packageGenerator->getStubContents("theme-master", [
            "THEME_KEY" => ucfirst($themeKey)
        ]));
    }
}
