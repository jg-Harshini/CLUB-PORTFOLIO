<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->renderable(function (TokenMismatchException $e, $request) {
            return redirect()
                ->route('login.form')
                ->with('error', 'Your session expired. Please log in again.');
        });
    }
}
