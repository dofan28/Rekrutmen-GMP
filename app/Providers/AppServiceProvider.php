<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'applicantcontact' => 'App\Models\ApplicantContact',
            'applicantdata' => 'App\Models\ApplicantData',
            'applicanteducationalbackground' => 'App\Models\ApplicantEducationalBackground',
            'applicantorganizationalexperience' => 'App\Models\ApplicantOrganizationalExperience',
            'applicantworkexperience' => 'App\Models\ApplicantWorkExperience',
            'application' => 'App\Models\Application',
            'hrddata' => 'App\Models\HrdData',
            'job' => 'App\Models\Job',
            'jobcompany' => 'App\Models\JobCompany',
            'jobeducation' => 'App\Models\JobEducation',
            'user' => 'App\Models\User',
        ]);

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
