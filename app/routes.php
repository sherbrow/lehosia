<?php

$app->get('/hello', function () {
    return 'world';
});

$app->get('/helloJson', function () {
    return response()->json(['who' => 'world']);
});

$app->get('/helloUri', function () {
    return url('hello');
});
