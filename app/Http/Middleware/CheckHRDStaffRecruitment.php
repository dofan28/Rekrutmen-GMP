<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckHRDStaffRecruitment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hrd = Auth::user();

        if ($hrd->hrddata->is_recruitment_staff == 1) {
            return $next($request);
        }
        return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman.');
    }
}
