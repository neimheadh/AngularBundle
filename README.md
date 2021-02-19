# AngularBundle
Angular frontend bundle for api-platform.

## What is AngularBundle?

AngularBundle allows you to manage your symfony API platform and an Angular
API and models abstraction at a time.

It creates a [new angular app](./Resources/doc/newAngularApp.md) in a new `app`
root directory using the "Feature, Shared, Core" module structure (see
[here](https://www.intertech.com/angular-module-tutorial-application-structure-using-modules/))
with an `ApiPlatformService` to request your CRUD API.

When you use the symfony `make:entity` command, it will allows you to also
generate / update an associated typescript model class:

```bash
$ bin/console make:entity

 Class name of the entity to create or update (e.g. BravePopsicle):
 > Book

 Mark this class as an API Platform resource (expose a CRUD API for it) (yes/no) [no]:
 > yes

 Generate the angular model class (yes/no) [yes]:
 > yes

```

## Installation

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
$ composer require neimheadh/angular-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require neimheadh/angular-bundle
```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Neimheadh\Bundle\AngularBundle\AngularBundle::class => ['dev' => true],
];
```
