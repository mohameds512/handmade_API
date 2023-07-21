<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use App\Models\System\System;

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
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

//    /**
//     * Render an exception into an HTTP response.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Throwable  $exception
//     * @return \Symfony\Component\HttpFoundation\Response
//     *
//     * @throws \Throwable
//     */
//    public function render($request, Throwable $exception)
//    {
//
//        if ($this->isHttpException($exception)) {
//
//            $statusCode = $exception->getStatusCode();
//            switch ($statusCode) {
//                case 404:
//                    return error(404, $exception->getMessage());
//                case 500;
//                    return error(500, $exception->getMessage());
//            }
//        }
//
////        dd($exception);
//
//        return error(System::HTTP_SERVER_ERROR, $exception->getMessage());
//    }

//    /**
//     * Render an exception into an HTTP response.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Throwable  $exception
//     * @return \Symfony\Component\HttpFoundation\Response
//     *
//     * @throws \Throwable
//     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException && $request->acceptsJson()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return parent::render($request, $exception);
    }
}
