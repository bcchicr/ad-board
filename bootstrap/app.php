<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ApprovedUserMiddleware;
use App\Http\Middleware\BannedUserMiddleware;
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
        $middleware->redirectGuestsTo(fn () => route('users.login'));
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'approved' => ApprovedUserMiddleware::class,
            'banned' => BannedUserMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
