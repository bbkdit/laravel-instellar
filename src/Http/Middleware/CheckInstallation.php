<?php

namespace Bbkdit\LaravelInstaller\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckInstallation
{
    public function handle(Request $request, Closure $next)
    {
        if (file_exists(storage_path('installed'))) {
            return redirect('/');
        }

        return $next($request);
    }
}
