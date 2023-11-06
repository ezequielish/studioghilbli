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

        //     /**
        //      * validate  request body
        //      */
        //     // if (isset($exception->validator)) {
        //     //     $msg = [];

        //     //     foreach ((array) $exception->validator->messages() as $k => $value) {
        //     //         if (\is_array($value)) {
        //     //             foreach ($value as $key_v => $val) {
        //     //                 array_push($msg, $val[0]);
        //     //             }
        //     //         }
        //     //     }
        //     return response()->json(['error' => true, 'message' => $msg[0]], 400);

        $message = $exception->getMessage();
        $expreg = '/(SQLSTATE)|(SQLCODE)/';
        $resp = [
            "error" => true,
            "message" => $exception->getMessage() ?? 'Internal Error',
        ];

        if (preg_match($expreg, $message) && config("app.env") == "local") {
            return response()->json($resp, 500);
        }

        if (method_exists($exception, 'getCode') && method_exists($exception, 'getMessage')) {
            $code = (intval($exception->getCode()) > 0 ? $exception->getCode() : 500);
            return response()->json($resp, $code);
        }

        $resp["message"] = 'Internal Error';
        return response()->json($resp, 500);
    }
}
