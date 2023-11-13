<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    // public function register(): void
    // {
    //     $this->reportable(function (Throwable $e) {

    //         // echo $e->getCode());
    //         return false;
    //     });
    // }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

        $message = $exception->getMessage();
        $code =  $exception->getCode() > 2 ? $exception->getCode() : 500;
        $expreg_sql = '/(SQLSTATE)|(SQLCODE)/';
        $expreg_auth_1 = '/Unauthenticated|Invalid credentials/';
        $expreg_auth_2 = '/Invalid ability provided/';

        $resp = [
            "error" => true,
            "message" => $exception->getMessage() ?? 'Internal Error',
        ];

        //DEV
        if (preg_match($expreg_sql, $message) && config("app.env") == "local") {
            return response()->json($resp, 500);
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////
        if (preg_match($expreg_auth_1, $message) ) {
            return response()->json($resp, 401);
        }

        if (preg_match($expreg_auth_2, $message) ) {
            return response()->json($resp, 403);
        }


        if (method_exists($exception, 'getCode') && method_exists($exception, 'getMessage')) {
            $code = (intval($code));
            return response()->json($resp, $code);
        }

        $resp["message"] = 'Internal Error';
        return response()->json($resp, 500);
    }
}
