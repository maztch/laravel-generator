<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base Controller
    |--------------------------------------------------------------------------
    |
    | This controller will be used as a base controller of all controllers
    |
    */

    'base_controller'          => 'App\Controllers\Controller',

    /*
    |--------------------------------------------------------------------------
    | Path for classes
    |--------------------------------------------------------------------------
    |
    | All Classes will be created on these relevant path
    |
    */

    'path_migration'           => base_path('database/migrations/'),

    'path_model'               => app_path('Models/'),

    'path_controller'          => app_path('Http/Controllers/'),

    'path_api_controller'      => app_path('Http/Controllers/Api/'),

    'path_views'               => base_path('resources/views/'),

    'path_routes'              => app_path('Http/routes.php'),

    'path_api_routes'          => app_path('Http/api_routes.php'),

    /*
    |--------------------------------------------------------------------------
    | Namespace for classes
    |--------------------------------------------------------------------------
    |
    | All Classes will be created with these namespaces
    |
    */

    'namespace_model'          => 'App\Models',

    'namespace_controller'     => 'App\Http\Controllers',

    'namespace_api_controller' => 'App\Http\Controllers\Api',

    /*
    |--------------------------------------------------------------------------
    | Model extend
    |--------------------------------------------------------------------------
    |
    | Model extend Configuration.
    | By default Eloquent model will be used.
    | If you want to extend your own custom model then you can specify "model_extend" => true and "model_extend_namespace" & "model_extend_class".
    |
    | e.g.
    | 'model_extend' => true,
    | 'model_extend_namespace' => 'App\Models\AppBaseModel as AppBaseModel',
    | 'model_extend_class' => 'AppBaseModel',
    |
    */

    'model_extend_class'   => 'Illuminate\Database\Eloquent\Model',

    /*
    |--------------------------------------------------------------------------
    | API routes prefix
    |--------------------------------------------------------------------------
    |
    | By default "api" will be prefix
    |
    */

    'api_prefix'               => 'api',

    'api_version'              => 'v1',

];
