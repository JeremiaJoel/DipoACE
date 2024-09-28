<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (!Auth::check()) {
        return redirect('/login');
    }

    $requiredRole = null;
    switch ($request->route()->getName()) {
        case 'dashboard-dekan':
            $requiredRole = 'dekan';
            break;
        case 'dashboard-mahasiswa':
            $requiredRole = 'mahasiswa';
            break;
        case 'dashboard-pembimbing':
            $requiredRole = 'pembimbing_akademik';
            break;
        case 'dashboard-kaprodi':
            $requiredRole = 'kaprodi';
            break;
        case 'dashboard-akademik':
            $requiredRole = 'bagian_akademik';
            break;
    }

    if ($requiredRole && Auth::user()->{$requiredRole} == '1') {
        return $next($request);
    }

    abort(403, 'Anda tidak memiliki izin untuk mengakses sumber daya ini.');
}
}

