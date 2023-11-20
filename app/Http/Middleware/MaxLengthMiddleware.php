<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaxLengthMiddleware
{
    public function handle($request, Closure $next, $maxChars = 50)
    {

       $input = $request->all();

        foreach ($input as $key => $value) {
            if (is_string($value) && mb_strlen($value, 'UTF-8') > $maxChars) {
                return redirect()->back()->withInput()->withErrors(["El mensaje es demasiado largo. Máximo {$maxChars} caracteres permitidos."]);
            }
        }

        return $next($request);
    }
}