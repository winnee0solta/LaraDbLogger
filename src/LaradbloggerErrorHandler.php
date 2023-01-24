<?php

namespace Winnee0solta\Laradblogger;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Winnee0solta\Laradblogger\Models\LaraDbLogger;
use Throwable;

class LaradbloggerErrorHandler extends ExceptionHandler
{
    public function report(Throwable  $exception)
    {
        $this->storeInDatabase($exception);
    }

    public function render($request, Throwable $exception)
    {
        $this->storeInDatabase($exception);
        return parent::render($request, $exception);
    }

    public function renderForConsole($output, Throwable $exception)
    {
        $this->storeInDatabase($exception);
        parent::renderForConsole($output, $exception);
    }

    public function shouldReport(Throwable $exception)
    {
        $this->storeInDatabase($exception);
        return parent::shouldReport($exception);
    }

    public function storeInDatabase($exception)
    {
        //--TODO: Check if table exists
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
}
