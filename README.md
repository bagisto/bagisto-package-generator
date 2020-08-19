# Bagisto Package Generator

## 1. Introduction

Bagisto Package Generator will create a sample package for you with a single command

It packs in lots of demanding features that allows your business to scale in no time:

* Create package with a single command.

## 2. Requirements

* **Bagisto**: v1.1.2 or higher.

## 3. Installation

### Install with composer

Go to the root folder of **Bagisto** and run the following command

~~~php
composer require bagisto/bagisto-package-generator
~~~

### Install without composer

* Unzip the respective extension zip and then merge "packages" folder into project root directory.
* Goto config/app.php file and add following line under 'providers'

~~~php
Webkul\PackageGenerator\Providers\PackageGeneratorServiceProvider::class
~~~

* Goto composer.json file and add following line under 'psr-4'

~~~json
"Webkul\\PackageGenerator\\": "packages/Webkul/PackageGenerator"
~~~

* Run these commands below to complete the setup

~~~php
composer dump-autoload
~~~

> That's it, now just execute the project on your specified domain.

## 4. Usage

After setting up, you will see that there are list of package commands which help you to make your package creation smooth and flawless.

Below are the list of commands,

| S. No. | Commands                               | Info                                           |
| :----- | :------------------------------------- | :--------------------------------------------- |
| 01.    | package:make                           | Create a new package.                          |
| 02.    | package:make-admin-controller          | Create a new admin controller.                 |
| 03.    | package:make-admin-route               | Create a new admin route file.                 |
| 04.    | package:make-command                   | Create a new command.                          |
| 05.    | package:make-datagrid                  | Create a new datagrid.                         |
| 06.    | package:make-event                     | Create a new event.                            |
| 07.    | package:make-listener                  | Create a new listener.                         |
| 08.    | package:make-mail                      | Create a new mail.                             |
| 09.    | package:make-middleware                | Create a new middleware.                       |
| 10.    | package:make-migration                 | Create a new migration.                        |
| 11.    | package:make-model                     | Create a new model.                            |
| 12.    | package:make-model-contract            | Create a new model contract.                   |
| 13.    | package:make-model-proxy               | Create a new model proxy.                      |
| 14.    | package:make-module-provider           | Create a new module service provider.          |
| 15.    | package:make-notification              | Create a new notification.                     |
| 16.    | package:make-payment                   | Create a new payment class.                    |
| 17.    | package:make-payment-method            | Create a new payment method.                   |
| 18.    | package:make-payment-method-provider   | Create a new payment method service provider.  |
| 19.    | package:make-provider                  | Create a new service provider.                 |
| 20.    | package:make-repository                | Create a new repository.                       |
| 21.    | package:make-request                   | Create a new request.                          |
| 22.    | package:make-seeder                    | Create a new seeder.                           |
| 23.    | package:make-shipping                  | Create a new shipping class.                   |
| 24.    | package:make-shipping-method           | Create a new shipping method.                  |
| 25.    | package:make-shipping-method-provider  | Create a new shipping method service provider. |
| 26.    | package:make-shop-controller           | Create a new shop controller.                  |
| 27.    | package:make-shop-route                | Create a new shop route file.                  |

### Let's get started with our first command

#### 1. Create a new package

This command will generate all the necessary files which previously you create manually for your package.

~~~php
php artisan package:make ACME/TestPackage
~~~

For e.g., If you want to create a package which named as '**TestPackage**', then you need to use the command like this,

~~~php
php artisan package:make ACME/TestPackage
~~~

This will create whole directory structure for you automatically so that you don't want to do manually like registering routes, views, etc.

##### New package with just directory structure

If you want to do things manually only need folder structures, then there is a optional argument known as '**plain**'. Below is the sample,

~~~php
php artisan package:make ACME/TestPackage --plain
~~~

##### New package with force command

If somehow folder or package is already present, then simple command won't work. So to overcome this problem we need to use force command.

~~~php
php artisan package:make ACME/TestPackage --force
~~~

#### 2. Create a new admin controller

This command will generate a new controller for your admin portion.

~~~php
php artisan package:make-admin-controller AdminTestController ACME/TestPackage
~~~

##### Create a new admin controller with force command

If controller is already present, then you need to use the force command.

~~~php
php artisan package:make-admin-controller AdminTestController ACME/TestPackage --force
~~~

#### 3. Create a new admin routes file

If you want to create an admin route, then you need to use this command and then register your routes file in the service provider i.e. '**ACME\TestPackage\Providers\TestPackageServiceProvider**'.

~~~php
php artisan package:make-admin-controller AdminTestController ACME/TestPackage
~~~

##### Create a new admin routes file with force command

If admin routes file already present and you want to override this, then you need to use force command.

~~~php
php artisan package:make-admin-controller AdminTestController ACME/TestPackage --force
~~~

#### 4. Create a new command class

This command will create a new command class in the '**src/Console/Commands**' directory.

~~~php
php artisan package:make-command TestCommand ACME/TestPackage
~~~

##### Create a new command class with force command

If command class already present then you can use force command for overwriting.

~~~php
php artisan package:make-command TestCommand ACME/TestPackage --force
~~~

#### 5. Create a new datagrid class

This command will create a new data grid class in '**src/Datagrids**' directory.

~~~php
php artisan package:make-datagrid TestDataGrid ACME/TestPackage
~~~

##### Create a new datagrid class with force command

If data grid class already present then you can use force command for overwriting.

~~~php
php artisan package:make-datagrid TestDataGrid ACME/TestPackage --force
~~~

#### 6. Create a new event class

This command will create a new event class in '**src/Events**' directory.

~~~php
php artisan package:make-event TestEvent ACME/TestPackage
~~~

##### Create a new event with force command

If event class already present then you can use force command for overwriting.

~~~php
php artisan package:make-event TestEvent ACME/TestPackage --force
~~~

#### 7. Create a new listener class

This command will create a new listener class in '**src/Listeners**' directory.

~~~php
php artisan package:make-listener TestListener ACME/TestPackage
~~~

##### Create a new listener class with force command

If listener class already present then you can use force command for overwriting.

~~~php
php artisan package:make-listener TestListener ACME/TestPackage --force
~~~

#### 8. Create a new mail class

This command will create a new mail class in '**src/Mail**' directory.

~~~php
php artisan package:make-mail TestMail ACME/TestPackage
~~~

##### Create a new mail class with force command

If mail class already present then you can use force command for overwriting.

~~~php
php artisan package:make-mail TestMail ACME/TestPackage --force
~~~

#### 9. Create a new middleware class

This command will create a new middleware class in '**src/Http/Middleware**' directory.

~~~php
php artisan package:make-middleware TestMiddleware ACME/TestPackage
~~~

##### Create a new middleware class with force command

If middleware class already present then you can use force command for overwriting.

~~~php
php artisan package:make-middleware TestMiddleware ACME/TestPackage --force
~~~

#### 10. Create a new migration class

This command will create a new migration class in '**src/Database/Migrations**' directory.

~~~php
php artisan package:make-migration TestMigration ACME/TestPackage
~~~

##### Create a new migration with force command

If migration class already present then you can use force command for overwriting.

~~~php
php artisan package:make-migration TestMigration ACME/TestPackage --force
~~~

#### 11. Create a new model class

This command will create a following files,

* New model class in '**src/Models**' directory.
* New model proxy class in '**src/Models**' directory.
* New model contract in '**src/Contracts**' directory.

~~~php
php artisan package:make-model TestModel ACME/TestPackage
~~~

##### Create a new model with force command

If model class already present then you can use force command for overwriting.

~~~php
php artisan package:make-model TestModel ACME/TestPackage --force
~~~

#### 12. Create a new model contract

This command will create a new model contract in '**src/Contracts**' directory.

~~~php
php artisan package:make-model-contract TestContract ACME/TestPackage
~~~

##### Create a new model contract with force command

If model contract already present then you can use force command for overwriting.

~~~php
php artisan package:make-model-contract TestDataGrid ACME/TestPackage --force
~~~

#### 13. Create a new model proxy class

This command will create a new model proxy class in '**src/Models**' directory.

~~~php
php artisan package:make-model-proxy TestModelProxy ACME/TestPackage
~~~

##### Create a new model proxy with force command

If model proxy class already present then you can use force command for overwriting.

~~~php
php artisan package:make-model-proxy TestModelProxy ACME/TestPackage --force
~~~

#### 14. Create a new module service provider

This command will create a new module service provider class in '**src/Providers**' directory.

~~~php
php artisan package:make-module-provider TestServiceProvider ACME/TestPackage
~~~

##### Create a new module service provider with force command

If module service provider class already present then you can use force command for overwriting.

~~~php
php artisan package:make-module-provider TestServiceProvider ACME/TestPackage --force
~~~

#### 15. Create a new notification

This command will create a new notification class in '**src/Notifications**' directory.

~~~php
php artisan package:make-notification TestNotification ACME/TestPackage
~~~

##### Create a new notification with force command

If notification class already present then you can use force command for overwriting.

~~~php
php artisan package:make-notification TestNotification ACME/TestPackage --force
~~~
