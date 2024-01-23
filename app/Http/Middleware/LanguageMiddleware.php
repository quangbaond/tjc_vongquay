<?php

namespace App\Http\Middleware;

use Closure as ClosureAlias;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param ClosureAlias(Request): (Response) $next
     */
    public function handle(Request $request, ClosureAlias $next): Response
    {
        $language = $request->session()->get('language', config('app.locale'));
        app()->setLocale($language);
        return $next($request);
    }
}
