<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AssociationMiddleware;
use App\Http\Middleware\UtilisateurMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RedirectIfAdminOrAssociation;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware ->alias([
            'admin' => AdminMiddleware::class,
            'association' => AssociationMiddleware::class,
            'utilisateur' => UtilisateurMiddleware::class,
            'userSeul' => RedirectIfAdminOrAssociation::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
