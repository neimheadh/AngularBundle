# Created new angular app

When you install `AngularBundle`, a new angular application is created in the
`app` root directory using the Feature, Shared, Core modules architecture.

A new `package.json` in your application root directory is created according
to composer informations. It can be changed if you want, for example, use a
different name for your Angular project.

The `neimheadh/api-platform` package is set as requirement in the `package.json`
automatically.

## Feature, Shared and Core Modules

This architecture is designed to use nested modules, separating elements into 3
different module types:

* The `app` module: Single `AppModule`, having the entry component and including
  the core and browser module. You shouldn't have to modify this module.
* The `core` module: Single `CoreModule` configured to be imported only once in
  your application, in `AppModule`. It includes the configuration layer of your
  application and elements used in all your feature modules. You should include
  your feature and shared modules in this module.
* The `shared` modules: Modules including elements used in several feature
  modules. At creation, a shared `ApiPlatformSharedModule` is created including
  future typescript api endpoints abstraction classes.
* The `feature` modules: Modules handling the features of your application. Your
  application should be composed by multiple feature modules, each of them
  managing a single area of your application. You can see a feature module as
  a mini stand alone application handling one function of your full application.

To help the files inclusions, `@app`, `@core`, `@shared` and `@feature` compiler
path are configured to access to different module paths.

## Nested routing

The created app use a nested routing system, that load your modules only
when it is necessary, which enhance the performance of a well-designed
application, all modules not being loaded if they don't have to do.

Routes are configured in the `app/core/routing/app.routes.ts` file, but you can
(and should four big applications) separate your routes in different
`*.routes.ts` file.

Keep in mind that routes configured in `app/core/routing/*.routes.ts` files
should only configure *entry* routes in your `feature` modules, sub routes
should be configured directly in your feature modules.

**Example**

Imagine you have books in your application, and a connected *book* section,
where you list your books on `/books` uri and edit books on `/books/{id}/edit`.

Then in your `app/core/routing/app.routes.ts`, just only put :

```typescript
{ path: 'books', loadChildren: () => import('@feature/book/book.module').then(m => m.BookModule) }
```

The `books` `/` and `/{id}/edit` sub routes should be configured in the
`BookModule` feature module.

## Created files

The created app files are following:

```
|- app/
    |- core/
        |- routing/
            |- app.routes.ts  
            |- routing.module.ts    
        |- core.module.ts
    |- shared/
        |- api_platform/  
            |- entities/  
                |- .gitkeep  
            |- api_platform.module.ts  
    |- features/
        |- .gitkeep  
    |- app.module.ts
    |- app.component.ts
|- package.json  
```

The file are created using the angular cli command `ng`, so it have to be
configured on your system.
