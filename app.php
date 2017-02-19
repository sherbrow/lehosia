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

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\ExceptionHandler::class
);

$app->group(['namespace' => 'App\Controllers', 'prefix' => env('BASE_URL', '')], function ($app) {
    require _BASEPATH_.'/app/routes.php';
});

return $app;
