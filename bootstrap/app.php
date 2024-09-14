<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Router;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        function(Router $router){
            $router->middleware('web')
                ->group(base_path('routes/web.php'));
            $router->middleware('web')
                ->group(base_path('routes/admin.php'));
            $router->middleware('web')
                ->group(base_path('routes/vendor.php'));
    //            $router->middleware('web')
    //                ->group(base_path('routes/patein.php'));
            // $router->middleware('web')
            // ->group(base_path('routes/unit.php'));
            // $router->middleware('web')
            // ->group(base_path('routes/category.php'));
            // $router->middleware('web')
            // ->group(base_path('routes/product.php'));
        },
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([

            'admin' => \App\Http\Middleware\Admin::class,
            'vendor' => \App\Http\Middleware\Vendor::class,
            'user' => \App\Http\Middleware\User::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
