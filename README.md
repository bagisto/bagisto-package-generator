### 1. Introduction:

Bagisto Package Generator will create a sample package for you with a single command

It packs in lots of demanding features that allows your business to scale in no time:

* Create package with a single command.


### 2. Requirements:

* **Bagisto**: v1.1.2 or higher.


### 3. Installation:

* Unzip the respective extension zip and then merge "packages" folder into project root directory.
* Goto config/app.php file and add following line under 'providers'

~~~
Webkul\PackageGenerator\Providers\PackageGeneratorServiceProvider::class
~~~

* Goto composer.json file and add following line under 'psr-4'

~~~
"Webkul\\PackageGenerator\\": "packages/Webkul/PackageGenerator"
~~~

* Run these commands below to complete the setup

~~~
composer dump-autoload
~~~

~~~
php artisan route:cache
~~~

> That's it, now just execute the project on your specified domain.