# Bagisto Package Generator

## 1. Introduction

Bagisto Package Generator will create a sample package for you with a single command

It packs in lots of demanding features that allows your business to scale in no time:

* Create package with a single command.

## 2. Requirements

* **Bagisto**: v2.0 or higher.

## 3. Installation

### Install with composer

Go to the root folder of **Bagisto** and run the following command

~~~php
composer require bagisto/bagisto-package-generator
~~~

> That's it, now just execute the project on your specified domain.

## 4. Summary

After setting up, you will see that there are list of package commands which help you to make your package creation smooth.

Below are the list of commands,

| S. No. | Commands                               | Info                                                                                                            | Required Arguments                     | Optional Arguments  |
| :----- | :------------------------------------- | :-------------------------------------------------------------------------------------------------------------- | :------------------------------------- | :------------------ |
| 01.    | package:make                           | [Create a new package.](#1-create-a-new-package)                                                                |  package-name                          | --force, --plain    |
| 02.    | package:make-admin-controller          | [Create a new admin controller.](#2-create-a-new-admin-controller)                                              |  controller-name, package-name         | --force             |
| 03.    | package:make-admin-route               | [Create a new admin routes file.](#3-create-a-new-admin-routes-file)                                            |  package-name                          | --force             |
| 04.    | package:make-shop-controller           | [Create a new shop controller.](#4-create-a-new-shop-controller)                                                |  controller-name, package-name         | --force             |
| 05.    | package:make-shop-route                | [Create a new shop routes file.](#5-create-a-new-shop-routes-file)                                              |  package-name                          | --force             |
| 06.    | package:make-model                     | [Create a new model class.](#6-create-a-new-model-class)                                                        |  model-name, package-name              | --force             |
| 07.    | package:make-model-proxy               | [Create a new model proxy class.](#7-create-a-new-model-proxy-class)                                            |  model-proxy-name, package-name        | --force             |
| 08.    | package:make-model-contract            | [Create a new model contract.](#8-create-a-new-model-contract)                                                  |  model-contract-name, package-name     | --force             |
| 09.    | package:make-migration                 | [Create a new migration class.](#9-create-a-new-migration-class)                                                |  migration-name, package-name          |                     |
| 10.    | package:make-seeder                    | [Create a new seeder class.](#10-create-a-new-seeder-class)                                                     |  seeder-name, package-name             | --force             |
| 11.    | package:make-request                   | [Create a new request class.](#11-create-a-new-request-class)                                                   |  request-name, package-name            | --force             |
| 12.    | package:make-middleware                | [Create a new middleware class.](#12-create-a-new-middleware-class)                                             |  middleware-name, package-name         | --force             |
| 13.    | package:make-datagrid                  | [Create a new datagrid class.](#13-create-a-new-datagrid-class)                                                 |  datagrid-name, package-name           | --force             |
| 14.    | package:make-repository                | [Create a new repository class.](#14-create-a-new-repository-class)                                             |  repository-name, package-name         | --force             |
| 15.    | package:make-provider                  | [Create a new service provider class.](#15-create-a-new-service-provider-class)                                 |  provider-name, package-name           | --force             |
| 16.    | package:make-event                     | [Create a new event class.](#16-create-a-new-event-class)                                                       |  event-name, package-name              | --force             |
| 17.    | package:make-listener                  | [Create a new listener class.](#17-create-a-new-listener-class)                                                 |  listener-name, package-name           | --force             |
| 18.    | package:make-notification              | [Create a new notification class.](#18-create-a-new-notification-class)                                         |  notification-name, package-name       | --force             |
| 19.    | package:make-mail                      | [Create a new mail class.](#19-create-a-new-mail-class)                                                         |  mail-name, package-name               | --force             |
| 20.    | package:make-command                   | [Create a new command class.](#20-create-a-new-command-class)                                                   |  command-name, package-name            | --force             |
| 21.    | package:make-payment                   | [Create a new payment class.](#21-create-a-new-payment-class)                                                   |  payment-name, package-name            | --force             |
| 22.    | package:make-shipping                  | [Create a new shipping class.](#22-create-a-new-shipping-class)                                                 |  shipping-name, package-name           | --force             |
| 23.    | package:make-module-provider           | [Create a new module service provider class.](#23-create-a-new-module-service-provider-class)                   |  provider-name, package-name           | --force             |
| 24.    | package:make-payment-method            | [Create a new payment method package.](#24-create-a-new-payment-method-package)                                 |  payment-package-name                  | --force             |
| 25.    | package:make-payment-method-provider   | [Create a new payment method service provider class.](#25-create-a-new-payment-method-service-provider-class)   |  provider-name, payment-package-name   | --force             |
| 26.    | package:make-shipping-method           | [Create a new shipping method package.](#26-create-a-new-shipping-method-package)                               |  shipment-package-name                 | --force             |
| 27.    | package:make-shipping-method-provider  | [Create a new shipping method service provider class.](#27-create-a-new-shipping-method-service-provider-class) |  provider-name, shipment-package-name  | --force             |
| 28.    | package:make-vite-config            | [Create a new vite config file.](#8-create-a-new-vite-config-file)                                                  |   package-name     | --force             |
| 29.    | package:make-tailwind-config            | [Create a new tailwind config file.](#8-create-a-new-tailwind-config-file)                                                  |   package-name     | --force             |
| 30.    | package:make-postcss-config            | [Create a new post css config file.](#8-create-a-new-post-css-config-file)                                                  |   package-name     | --force             |
| 31.    | create-a-new-theme-for-admin  | [Create a new theme for admin.](#32-create-a-new-theme-for-admin) |  theme-name  | --force             |


**--force** : To overwrite the files

**--plain** : When you need only directory structure template, files are not included when this argument is passed

## 5. Usage

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
php artisan package:make-admin-route ACME/TestPackage
~~~

##### Create a new admin routes file with force command

If admin routes file already present and you want to override this, then you need to use force command.

~~~php
php artisan package:make-admin-route ACME/TestPackage --force
~~~

#### 4. Create a new shop controller

This command will generate a new controller for your shop portion i.e. '**packages/ACME/TestPackage/src/Http/Controllers/Shop**'.

~~~php
php artisan package:make-shop-controller ShopTestController ACME/TestPackage
~~~

##### Create a new shop controller with force command

If controller is already present, then you need to use the force command.

~~~php
php artisan package:make-shop-controller ShopTestController ACME/TestPackage --force
~~~

#### 5. Create a new shop routes file

If you want to create a shop route, then you need to use this command and then register your routes file in the service provider i.e. 'ACME\TestPackage\Providers\TestPackageServiceProvider'.

~~~php
php artisan package:make-shop-route ACME/TestPackage
~~~

##### Create a new shop routes file with force command

If shop routes file already present and you want to override this, then you need to use force command.

~~~php
php artisan package:make-shop-route ACME/TestPackage --force
~~~

#### 6. Create a new model class

This command will create a following files,

* New model class in '**packages/ACME/TestPackage/src/Models**' directory.
* New model proxy class in '**packages/ACME/TestPackage/src/Models**' directory.
* New model contract in '**packages/ACME/TestPackage/src/Contracts**' directory.

~~~php
php artisan package:make-model TestModel ACME/TestPackage
~~~

##### Create a new model with force command

This command will overwrite all three files.

~~~php
php artisan package:make-model TestModel ACME/TestPackage --force
~~~

#### 7. Create a new model proxy class

This command will create a new model proxy class in '**packages/ACME/TestPackage/src/Models**' directory.

~~~php
php artisan package:make-model-proxy TestModelProxy ACME/TestPackage
~~~

##### Create a new model proxy with force command

If model proxy class already present then you can use force command for overwriting.

~~~php
php artisan package:make-model-proxy TestModelProxy ACME/TestPackage --force
~~~

#### 8. Create a new model contract

This command will create a new model contract in '**packages/ACME/TestPackage/src/Contracts**' directory.

~~~php
php artisan package:make-model-contract TestContract ACME/TestPackage
~~~

##### Create a new model contract with force command

If model contract already present then you can use force command for overwriting.

~~~php
php artisan package:make-model-contract TestDataGrid ACME/TestPackage --force
~~~

#### 9. Create a new migration class

This command will create a new migration class in '**packages/ACME/TestPackage/src/Database/Migrations**' directory.

~~~php
php artisan package:make-migration TestMigration ACME/TestPackage
~~~

#### 10. Create a new seeder class

This command will create a new seeder class in '**packages/ACME/TestPackage/src/Database/Seeders**' directory.

~~~php
php artisan package:make-seeder TestSeeder ACME/TestPackage
~~~

##### Create a new seeder class with force command

If seeder class already present then you can use force command for overwriting.

~~~php
php artisan package:make-seeder TestSeeder ACME/TestPackage --force
~~~

#### 11. Create a new request class

This command will create a new request class in '**packages/ACME/TestPackage/src/Http/Requests**' directory.

~~~php
php artisan package:make-request TestRequest ACME/TestPackage
~~~

##### Create a new request class with force command

If request class already present then you can use force command for overwriting.

~~~php
php artisan package:make-request TestRequest ACME/TestPackage --force
~~~

#### 12. Create a new middleware class

This command will create a new middleware class in '**packages/ACME/TestPackage/src/Http/Middleware**' directory.

~~~php
php artisan package:make-middleware TestMiddleware ACME/TestPackage
~~~

##### Create a new middleware class with force command

If middleware class already present then you can use force command for overwriting.

~~~php
php artisan package:make-middleware TestMiddleware ACME/TestPackage --force
~~~

#### 13. Create a new datagrid class

This command will create a new data grid class in '**packages/ACME/TestPackage/src/Datagrids**' directory.

~~~php
php artisan package:make-datagrid TestDataGrid ACME/TestPackage
~~~

##### Create a new datagrid class with force command

If data grid class already present then you can use force command for overwriting.

~~~php
php artisan package:make-datagrid TestDataGrid ACME/TestPackage --force
~~~

#### 14. Create a new repository class

This command will create a new repository class in '**packages/ACME/TestPackage/src/Repositories**' directory.

~~~php
php artisan package:make-repository TestRepository ACME/TestPackage
~~~

##### Create a new repository with force command

If repository class already present then you can use force command for overwriting.

~~~php
php artisan package:make-repository TestRepository ACME/TestPackage --force
~~~

#### 15. Create a new service provider class

This command will create a new service provider class in '**packages/ACME/TestPackage/src/Providers**' directory.

~~~php
php artisan package:make-provider TestServiceProvider ACME/TestPackage
~~~

##### Create a new service provider with force command

If service provider class already present then you can use force command for overwriting.

~~~php
php artisan package:make-provider TestServiceProvider ACME/TestPackage --force
~~~

#### 16. Create a new event class

This command will create a new event class in '**packages/ACME/TestPackage/src/Events**' directory.

~~~php
php artisan package:make-event TestEvent ACME/TestPackage
~~~

##### Create a new event with force command

If event class already present then you can use force command for overwriting.

~~~php
php artisan package:make-event TestEvent ACME/TestPackage --force
~~~

#### 17. Create a new listener class

This command will create a new listener class in '**packages/ACME/TestPackage/src/Listeners**' directory.

~~~php
php artisan package:make-listener TestListener ACME/TestPackage
~~~

##### Create a new listener class with force command

If listener class already present then you can use force command for overwriting.

~~~php
php artisan package:make-listener TestListener ACME/TestPackage --force
~~~

#### 18. Create a new notification class

This command will create a new notification class in '**packages/ACME/TestPackage/src/Notifications**' directory.

~~~php
php artisan package:make-notification TestNotification ACME/TestPackage
~~~

##### Create a new notification with force command

If notification class already present then you can use force command for overwriting.

~~~php
php artisan package:make-notification TestNotification ACME/TestPackage --force
~~~

#### 19. Create a new mail class

This command will create a new mail class in '**packages/ACME/TestPackage/src/Mail**' directory.

~~~php
php artisan package:make-mail TestMail ACME/TestPackage
~~~

##### Create a new mail class with force command

If mail class already present then you can use force command for overwriting.

~~~php
php artisan package:make-mail TestMail ACME/TestPackage --force
~~~

#### 20. Create a new command class

This command will create a new command class in the '**packages/ACME/TestPackage/src/Console/Commands**' directory.

~~~php
php artisan package:make-command TestCommand ACME/TestPackage
~~~

##### Create a new command class with force command

If command class already present then you can use force command for overwriting.

~~~php
php artisan package:make-command TestCommand ACME/TestPackage --force
~~~

#### 21. Create a new payment class

This command will create a new payment class in '**packages/ACME/TestPackage/src/Payment**' directory.

~~~php
php artisan package:make-payment TestPayment ACME/TestPackage
~~~

##### Create a new payment with force command

If payment class already present then you can use force command for overwriting.

~~~php
php artisan package:make-payment TestPayment ACME/TestPackage --force
~~~

#### 22. Create a new shipping class

This command will create a new shipping class in '**packages/ACME/TestPackage/src/Carriers**' directory.

~~~php
php artisan package:make-shipping TestShipping ACME/TestPackage
~~~

##### Create a new shipping class with force command

If shipping class already present then you can use force command for overwriting.

~~~php
php artisan package:make-shipping TestShipping ACME/TestPackage --force
~~~

#### 23. Create a new module service provider class

This command will create a new module service provider class in '**packages/ACME/TestPackage/src/Providers**' directory.

~~~php
php artisan package:make-module-provider TestServiceProvider ACME/TestPackage
~~~

##### Create a new module service provider with force command

If module service provider class already present then you can use force command for overwriting.

~~~php
php artisan package:make-module-provider TestServiceProvider ACME/TestPackage --force
~~~

#### 24. Create a new vite config file.

This command will create a new vite config file in '**packages/ACME/TestPackage**' directory.

~~~php
php artisan package:make-vite-config vite.config ACME/TestPackage
~~~

##### This command will create a new vite config file with force command

If vite config file already present then you can use force command for overwriting.

~~~php
php artisan package:make-vite-config vite.config ACME/TestPackage --force
~~~

#### 25. Create a new tailwind config file.

This command will create a new tailwind config file in '**packages/ACME/TestPackage**' directory.

~~~php
php artisan package:make-tailwind-config tailwind.config ACME/TestPackage
~~~

##### This command will create a new tailwind config file with force command

If tailwind config file already present then you can use force command for overwriting.

~~~php
php artisan package:make-tailwind-config tailwind.config ACME/TestPackage --force
~~~

#### 26. Create a new post css config file.

This command will create a new post css config file in '**packages/ACME/TestPackage**' directory.

~~~php
php artisan package:make-postcss-config postcss.config ACME/TestPackage
~~~

##### This command will create a new postcss config file with force command

If postcss config file already present then you can use force command for overwriting.

~~~php
php artisan package:make-postcss-config tailwind.config ACME/TestPackage --force
~~~



#### 27. Create a new payment method package

This command will create a whole new payment package for you in  '**packages/ACME/Stripe**' directory.

~~~php
php artisan package:make-payment-method ACME/Stripe
~~~

##### Create a new payment method with force command

This command will overwrite whole directory structure.

~~~php
php artisan package:make-payment-method ACME/Stripe --force
~~~

#### 28. Create a new payment method service provider class

This command will create a new payment method service provider class in '**packages/ACME/Stripe/src/Providers**' directory.

~~~php
php artisan package:make-payment-method-provider TestPaymentMethodServiceProvider ACME/Stripe
~~~

##### Create a new payment method service provider class with force command

If payment method service provider class already present then you can use force command for overwriting.

~~~php
php artisan package:make-payment-method-provider TestPaymentMethodServiceProvider ACME/Stripe --force
~~~

#### 29. Create a new shipping method package

This command will create a whole new shipment package in '**packages/ACME/FedEx**' directory.

~~~php
php artisan package:make-shipping-method ACME/FedEx
~~~

##### Create a new shipping method with force command

This command will override whole directory structure.

~~~php
php artisan package:make-shipping-method ACME/FedEx --force
~~~

#### 30. Create a new shipping method service provider class

This command will create a new shipping method service provider class '**packages/ACME/FedEx/src/Providers**' directory.

~~~php
php artisan package:make-shipping-method-provider TestShippingMethodServiceProvider ACME/FedEx
~~~

##### Create a new shipping method service provider with force command

If shipping method service provider class already present then you can use force command for overwriting.

~~~php
php artisan package:make-shipping-method-provider TestShippingMethodServiceProvider ACME/FedEx --force
~~~

#### 31. Create a new theme for shop

This command will create a new theme array inside '**config/themes.php**' file under **shop** key.

~~~php
php artisan package:make-shop-theme test ACME/Theme --force
~~~

#### 32. Create a new theme for admin

This command will create a new theme array inside '**config/themes.php**' file under **admin** key.

~~~php
php artisan package:make-admin-theme test ACME/Theme --force
~~~