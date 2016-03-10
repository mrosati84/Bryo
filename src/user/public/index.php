<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/

// Require the autoloader for the user app.
require_once __DIR__.'/../../vendor/autoload.php';

// Create the core Lumen app.
$app = require __DIR__.'/../../core/bootstrap/app.php';

// Run the application.
$app->run();
