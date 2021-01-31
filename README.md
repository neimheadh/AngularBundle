# AngularBundle
Angular frontend bundle for api-platform.

## What is AngularBundle?

AngularBundle allows you to manage your symfony API platform and an Angular
API and models abstraction at a time.

It creates a new angular app in a new `app` root directory using the
"Feature, Shared, Core" module structure (see [here](https://www.intertech.com/angular-module-tutorial-application-structure-using-modules/))
with an `ApiPlatformService` (`app/core/services/api-platform.service.ts`) to
request your CRUD API.

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
