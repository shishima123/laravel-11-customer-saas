<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(\App\Http\Middleware\NoCacheBrowser::class);
        $middleware->append(\App\Http\Middleware\LanguageSwitcher::class);

        $middleware->alias([
            'changed.info' => \App\Http\Middleware\CheckUserChangedInfo::class,
            'changed.password' => \App\Http\Middleware\CheckUserChangedPassword::class,
            'activated' => \App\Http\Middleware\UserActivated::class,
            'role' => \App\Http\Middleware\Role::class,
            'current.auth.customer' => \App\Http\Middleware\CurrentAuthenticatedCustomer::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
