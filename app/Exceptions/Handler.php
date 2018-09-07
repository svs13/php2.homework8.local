<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        /*
        $lines = [];
        $lines[] = 'File: ' . $exception->getFile();
        $lines[] = 'Line: ' . $exception->getLine();
        $lines[] = 'Code: ' . $exception->getCode();
        $lines[] = 'StatusCode: ' . $exception->getStatusCode() ?? '';
        $lines[] = 'Message: ' . $exception->getMessage();

        Log::error('Exception', $lines );
*/
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            return response()->view('error', ['exception' => $exception], $exception->getStatusCode());
        }
        return parent::render($request, $exception);
    }
}
