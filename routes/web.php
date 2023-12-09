<?php

use App\Livewire\Landing\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\ApplicantApplicationConfirmController;
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
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');;
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
Route::get('/jobs', \App\Livewire\Landing\Job\Index::class);
Route::get('/jobs/{id}', \App\Livewire\Landing\Job\Show::class);
Route::get('/jobcompany/{id}', \App\Livewire\Landing\Job\JobCompany::class);


// applicant
Route::middleware('auth')->prefix('applicant')->group(function () {
    // applicant/application
    Route::get('/application', \App\Livewire\Applicant\Application\Index::class);
    Route::get('/application/{id}/create', \App\Livewire\Applicant\Application\Create::class)->middleware('checkdata');
    Route::get('application/{id}/show', \App\Livewire\Applicant\Application\Show::class);
    Route::get('/application/applicationletter/{id}', \App\Livewire\Applicant\Application\ApplicationLetter::class);
    Route::get('/application/{id}/confirm', ApplicantApplicationConfirmController::class);

    // applicant/jobs
    Route::get('/jobs', \App\Livewire\Applicant\Jobs\Index::class);
    Route::get('/jobs/{id}', \App\Livewire\Applicant\Jobs\Show::class);

    // applicant/change-password
    // Route::get('/change-password', [ApplicantProfileController::class, 'changePassword']);
    // Route::post('/applicant/change-password', [ApplicantProfileController::class, 'updatePassword']);
    Route::resource('/profile/educationalbackground', ApplicantProfileEducationalBackgroundController::class);
    Route::resource('/profile/workexperience', ApplicantProfileWorkExperienceController::class);
    Route::resource('/profile/organizationalexperience', ApplicantProfileOrganizationalExperienceController::class);

    Route::get('/profile/applicantdata', \App\Livewire\Applicant\Profile\ApplicantData\Index::class);
    Route::get('/profile/change-password',  \App\Livewire\Applicant\Profile\ChangePassword::class);
    Route::get('/profile/contact', \App\Livewire\Applicant\Profile\Contact\Index::class);
    // Route::get('/profile/workexperience', \App\Livewire\Applicant\Profile\WorkExperience\Index::class);
    // Route::get('/profile/educationalbackground',\App\Livewire\Applicant\Profile\EducationalBackground\Index::class);
    // Route::get('/profile/organizationalexperience', \App\Livewire\Applicant\Profile\OrganizationalExperience\Index::class);

});

//Bantuan
Route::get('/contact', \App\Livewire\Landing\Contact::class);
Route::get('/faq', \App\Livewire\Landing\Faq::class);

