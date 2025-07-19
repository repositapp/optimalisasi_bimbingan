<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch ($guard) {
                    case 'web':
                        return redirect('/panel/dashboard');
                    case 'user':
                        $user = Auth::guard('user')->user();

                        if ($user->role === 'mahasiswa') {
                            return redirect('/mahasiswa/dashboard');
                        } elseif ($user->role === 'dosen') {
                            return redirect('/dosen/dashboard');
                        } else {
                            abort(404);  // Role tidak dikenali, tampilkan halaman 404
                        }
                }
            }
        }

        return $next($request);
    }
}
