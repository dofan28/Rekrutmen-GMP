<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\ApplicantProfileWorkExperienceController;
use App\Http\Controllers\ApplicantProfileEducationalBackgroundController;
use App\Http\Controllers\ApplicantProfileOrganizationalExperienceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Livewire\Landing\Home::class)->name('home');

Route::middleware('guest')->group(function () {
    // login
    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
    // register
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
});

Route::get('password/reset', \App\Livewire\Auth\Passwords\Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', \App\Livewire\Auth\Passwords\Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', \App\Livewire\Auth\Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', \App\Livewire\Auth\Passwords\Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


// job
Route::get('/jobs', \App\Livewire\Landing\Job\Index::class)->name('jobs.index');
Route::get('/jobcompany/{jobcompany}', \App\Livewire\Landing\Job\JobCompany::class)->name('jobcompany'); // belum selesai
Route::get('/jobs/{job}', \App\Livewire\Landing\Job\Show::class)->name('jobs.show');


// applicant
Route::middleware(['auth', 'role:applicant', 'verified'])->prefix('applicant')->group(function () {
    // applicant/application
    Route::get('/application', \App\Livewire\Applicant\Application\Index::class)->name('applicant.application.index');
    Route::get('/application/{id}/create', \App\Livewire\Applicant\Application\Create::class)->name('applicant.application.create')->middleware('checkdata'); // fix
    Route::get('application/{application}/show', \App\Livewire\Applicant\Application\Show::class)->name('applicant.application.show');
    Route::get('/application/applicationletter/{application}', \App\Livewire\Applicant\Application\ApplicationLetter::class)->name('applicant.application.applicationletter');

    // applicant/jobs
    Route::get('/jobs', \App\Livewire\Applicant\Jobs\Index::class)->name('applicant.jobs.index');
    Route::get('/jobs/{job}', \App\Livewire\Applicant\Jobs\Show::class)->name('applicant.jobs.show');

    // applicant/change-password
    // Route::get('/change-password', [ApplicantProfileController::class, 'changePassword']);
    // Route::post('/applicant/change-password', [ApplicantProfileController::class, 'updatePassword']);
    Route::resource('/profile/educationalbackground', ApplicantProfileEducationalBackgroundController::class);
    Route::resource('/profile/workexperience', ApplicantProfileWorkExperienceController::class);
    Route::resource('/profile/organizationalexperience', ApplicantProfileOrganizationalExperienceController::class);

    Route::get('/profile/applicantdata', \App\Livewire\Applicant\Profile\ApplicantData\Index::class)->name('applicant.profile.applicantdata');
    Route::get('/profile/applicantdata/{applicantdata}/edit', \App\Livewire\Applicant\Profile\ApplicantData\Edit::class)->name('applicant.profile.applicantdata.edit');
    Route::get('/profile/change-password',  \App\Livewire\Applicant\Profile\ChangePassword::class)->name('applicant.profile.change-password');
    Route::get('/profile/contact', \App\Livewire\Applicant\Profile\Contact\Index::class)->name('applicant.profile.contact');
    // Route::get('/profile/workexperience', \App\Livewire\Applicant\Profile\WorkExperience\Index::class);
    // Route::get('/profile/educationalbackground',\App\Livewire\Applicant\Profile\EducationalBackground\Index::class);
    // Route::get('/profile/organizationalexperience', \App\Livewire\Applicant\Profile\OrganizationalExperience\Index::class);

});

//Bantuan
Route::get('/help/contact', \App\Livewire\Landing\Contact::class)->name('help.contact');
Route::get('/help/faq', \App\Livewire\Landing\Faq::class)->name('help.faq');

