# Bagisto Package Generator

## 1. Introduction

Bagisto Package Generator will create a sample package for you with a single command

It packs in lots of demanding features that allows your business to scale in no time:

* Create package with a single command.

## 2. Requirements

* **Bagisto**: v1.1.2 or higher.

## 3. Installation

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

This command will generate controller for your admin portion.

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
