<?php

use Illuminate\Foundation\Application;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Psr\Http\Message\ResponseInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        
        $exceptions->render(function (ValidationException $e){
            
            return response()->json([
                "success" =>  false,
                "message" => config('app.debug') ? $e->getMessage() : "Error datos erroneos",
                "errores" => $e->errors()
            ], 422);
        });

        $exceptions->render(function (AuthenticationException $e){
            return response()->json([
                "success" => false,
                "message" => config('app.debug') ? $e->getMessage() : "No esta autentificado"
            ],401);
        });

        $exceptions->render( function (ModelNotFoundException | NotFoundHttpException  $e) {
            return response()->json([
                "success" => false,
                "message" => config('app.debug') ? $e->getMessage() : "El recurso no se ha encontrado"
            ], 404);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e){
            return response()->json([
                "success" => false,
                "message" => config('app.debug') ? $e->getMessage() : "Metodo HTTP no perimitido"
            ], 405);
        });

        $exceptions->render(function (\Throwable $th){
            return response()->json([
                "success" => false,
                "message" => config('app.debug') ? $th->getMessage() : "Error interno del servidor"
            ], 500);
        });

    })->create();
