<?php

namespace winnee0solta\Laradblogger;

use Exception;

use Illuminate\Contracts\Debug\ExceptionHandler;
use winnee0solta\Laradblogger\Models\LaraDbLogger;

class LaradbloggerErrorHandler implements ExceptionHandler
{
    public function report($exception)
    {
        $error = new LaraDbLogger();
        $error->message = $exception->getMessage();
        $error->trace = $exception->getTraceAsString();
        $error->file = $exception->getFile();
        $error->line = $exception->getLine();
        $error->class = get_class($exception);
        $error->function = $exception->getTrace()[0]['function'];
        $error->path = request()->path();
        $error->method = request()->method();
        $error->ip = request()->ip();
        $error->user_agent = request()->userAgent();
        $error->user_id = auth()->id();
        $error->input = json_encode(request()->all());
        $error->save();
    }

    public function shouldReport($e)
    {
        // Your logic to determine if the exception should be reported
    }

    public function render($request, $e)
    {
        // Your logic to render the exception as a response
    }

    public function renderForConsole($output, $e)
    {
    }
}
