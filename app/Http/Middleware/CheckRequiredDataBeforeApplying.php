<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRequiredDataBeforeApplying
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $applicant = Auth::user();


        if (!$applicant->applicantdata && !$applicant->contact && $applicant->educationalbackground->isEmpty() && $applicant->workexperience->isEmpty() && $applicant->organizationalexperience->isEmpty()) {
            return redirect('/applicant/profile/applicantdata')->with('notification', 'Silakan lengkapi semua data terlebih dahulu.');
        } elseif (!$applicant->applicantdata) {
            return redirect('/applicant/profile/applicantdata')->with('notification', 'Silakan isi data pribadi.');
        } elseif (!$applicant->contact) {
            return redirect('/applicant/profile/contact')->with('notification', 'Silakan isi data kontak.');
        } elseif ($applicant->educationalbackground->isEmpty()) {
            return redirect('/applicant/profile/educationalbackground')->with('notification', 'Silakan isi data riwayat pendidikan.');
        } elseif ($applicant->workexperience->isEmpty()) {
            return redirect('/applicant/profile/workexperience')->with('notification', 'Silakan isi data pengalaman kerja.');
        } elseif ($applicant->organizationalexperience->isEmpty()) {
            return redirect('/applicant/profile/organizationalexperience')->with('notification', 'Silakan isi data pengalaman berorganisasi.');
        }

        return $next($request);
    }
}
