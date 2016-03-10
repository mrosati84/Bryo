<?php

// Sample closure route.
$app->get('/', function () use ($app) {
    return 'Hello with Bryo';
});

// Sample controller route.
$app->get('sample', [
    'as' => 'sample',
    'uses' => 'App\Controllers\SampleController@index'
]);
