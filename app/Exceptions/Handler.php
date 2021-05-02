<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Throwable;
use Illuminate\Auth\AuthenticationException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = Arr::get($exception->guards(),0);

        switch ($guard){
            case 'admin':
                $login = 'admin.login';
                break;
            default:
                $login = 'login';
                break;
        }
        return $request->expectsJson()
            ? response()->json(['message' => $exception->getMessage()], 401)
            : redirect()->guest(route($login));


        //: redirect()->guest(route($login));

    }
}
