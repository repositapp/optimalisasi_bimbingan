<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        if ($request->is('admin/*')) {
            return route('login');  // halaman login admin
        } elseif ($request->is('mahasiswa/*') || $request->is('dosen/*')) {
            return route('user.login');  // halaman login user (mahasiswa/dosen)
        } else {
            return route('login'); // default fallback
        }
    }
}
