<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'pemilik' => App\Http\Middleware\pemilik::class,
            'pemilik-packaging' => App\Http\Middleware\PemilikPackaging::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
