<?php

namespace App\Http\Middleware;

use Dotenv\Util\Str;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (\Illuminate\Support\Str::contains(Request::path(),'dashboard'))
                return route('admin.login');
            else{
                abort(401);
            }
        }
    }
}
