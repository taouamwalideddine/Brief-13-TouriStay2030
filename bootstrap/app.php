<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register custom middleware
        $middleware->alias([
            'isOwner' => \App\Http\Middleware\IsOwner::class,
            'isTourist' => \App\Http\Middleware\isTourist::class, // Add this if you have a tourist middleware
        ]);

        // Define middleware groups
        $middleware->group('owner', [
            'auth',
            'isOwner',
        ]);

        $middleware->group('tourist', [
            'auth',
            'isTourist',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
