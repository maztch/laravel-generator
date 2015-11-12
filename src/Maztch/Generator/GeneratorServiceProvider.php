<?php

namespace Maztch\Generator;

use Illuminate\Support\ServiceProvider;
use Maztch\Generator\Commands\APIGeneratorCommand;
use Maztch\Generator\Commands\PublisherCommand;
use Maztch\Generator\Commands\ScaffoldAPIGeneratorCommand;
use Maztch\Generator\Commands\ScaffoldGeneratorCommand;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../../../config/generator.php';

        $this->publishes([
            $configPath => config_path('generator.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('maztch.generator.publish', function ($app) {
            return new PublisherCommand();
        });

        $this->app->singleton('maztch.generator.api', function ($app) {
            return new APIGeneratorCommand();
        });

        $this->app->singleton('maztch.generator.scaffold', function ($app) {
            return new ScaffoldGeneratorCommand();
        });

        $this->app->singleton('maztch.generator.scaffold_api', function ($app) {
            return new ScaffoldAPIGeneratorCommand();
        });

        $this->commands([
            'maztch.generator.publish',
            'maztch.generator.api',
            'maztch.generator.scaffold',
            'maztch.generator.scaffold_api',
        ]);
    }
}
