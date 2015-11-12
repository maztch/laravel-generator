Laravel5 Generator (Laravel5.1)
=======================

Based on Maztch generator, this is a more simple scaffold and just need to be used in dev.

I did this beacuse i need more simple generator and keep all out the repo dependencies in production.

Diferences with maztch: 

There are no Requests and there are no Library/Repositories
Base controller is removed (Maztch/Controller/AppBaseController)
Added delete function in controller for DELETE method and keep destroy just as an alias.

Except for this, is exactly the same.

The artisan command can generate the following items:
  * Migration File
  * Model
  * Controller
  * View
    * index.blade.php
    * table.blade.php
    * show.blade.php
    * show_fields.blade.php
    * create.blade.php
    * edit.blade.php
    * fields.blade.php
  * adjusts routes.php

# Documentation is in process...

Documentation
--------------

While we write the docs you can take a look to [Mitul repo](https://github.com/mitulgolakiya/laravel-api-generator/readme.md).


## Installation

1. Add this package to your composer.json:
  
        "repositories": [
            {
                "type": "git",
                "url": "https://github.com/mitulgolakiya/laracast-flash"
            }
        ],
        "require": {
            "laracasts/flash": "dev-master",
            "laravelcollective/html": "5.1.*@dev",
            "bosnadev/repositories": "dev-master",
            "maztch/laravel-generator": "dev-master"
        }
  
2. Run composer update

        composer update
    
3. Add the ServiceProviders to the providers array in ```config/app.php```.<br>
   As we are using these two packages [laravelcollective/html](https://github.com/LaravelCollective/html) & [laracasts/flash](https://github.com/laracasts/flash) as a dependency.<br>
   so we need to add those ServiceProviders as well.

    Collective\Html\HtmlServiceProvider::class,
    Laracasts\Flash\FlashServiceProvider::class,
    Maztch\Generator\GeneratorServiceProvider::class,
        
   Also for convenience, add these facades in alias array in ```config/app.php```.

    'Form'      => Collective\Html\FormFacade::class,
    'Html'      => Collective\Html\HtmlFacade::class,
    'Flash'     => Laracasts\Flash\Flash::class


## Configuration

Publish Configuration file ```generator.php```.

        php artisan vendor:publish --provider="Maztch\Generator\GeneratorServiceProvider"


## Publish & Initialization

Mainly, we need to do three basic things to get started.
1. Publish some common views like ```errors.blade.php``` & ```paginate.blade.php```.
2. Publish ```api_routes.php``` which will contain all our api routes.
3. Init ```routes.php``` for api routes. We need to include ```api_routes.php``` into main ```routes.php```.

        php artisan mitul.generator:publish
