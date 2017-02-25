<?php

!defined('_BASEPATH_') && define('_BASEPATH_', realpath(__DIR__));

require_once(_BASEPATH_.'/vendor/autoload.php');

try {
    (new Dotenv\Dotenv(_BASEPATH_))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

$app = new Laravel\Lumen\Application(
    realpath(_BASEPATH_)
);
$app->withEloquent();
$app->withFacades();

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\ExceptionHandler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Laravel\Lumen\Console\Kernel::class
);

$app->group(['namespace' => 'App\Controllers', 'prefix' => env('BASE_URL', '')], function ($app) {
    require _BASEPATH_.'/app/routes.php';
});

return $app;
