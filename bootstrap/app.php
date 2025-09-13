<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\TokenMismatchException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // ✅ Register middleware aliases
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'prevent-back-history' => \App\Http\Middleware\PreventBackHistory::class, // NEW
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // ✅ Handle 419 Page Expired (TokenMismatch)
        $exceptions->render(function (TokenMismatchException $e, $request) {
            return redirect()
                ->route('login.form')
                ->with('error', 'Your session expired. Please log in again.');
        });
    })
    ->create();
