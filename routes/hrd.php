<?php

use App\Http\Controllers\HRDApplicationRejectController;
use App\Http\Controllers\HRDJobCloseController;
use App\Http\Controllers\HRDJobDeleteController;
use App\Http\Controllers\HRDJobOpenController;
use App\Http\Controllers\HRDJobWaitingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRDPublishJobAgreeController;
use App\Http\Controllers\HRDPublishJobDisagreeController;

// hrd/applications
Route::get('/applications', \App\Livewire\Hrd\Applications\Index::class);
Route::get('/applications/applicant/{id}', \App\Livewire\Hrd\Applications\ApplicantShow::class);
Route::get('/applications/job/{id}', \App\Livewire\Hrd\Applications\JobShow::class);
Route::get('/applications/{id}/accept', \App\Livewire\Hrd\Applications\Accept::class);
Route::get('/applications/{application}/reject', HRDApplicationRejectController::class);


// hrd/jobs
// Route::get('/jobs', \App\Livewire\Hrd\Jobs\Index::class);
// Route::get('/jobs/create', \App\Livewire\Hrd\Jobs\Create::class);
// Route::get('/jobs/{id}/edit', \App\Livewire\Hrd\Jobs\Edit::class);
// Route::get('/jobs/detail/{id}', \App\Livewire\Hrd\Jobs\Show::class);
// Route::delete('/jobs/{id}', HRDJobDeleteController::class);
// Route::get('/jobs/publish-manage', \App\Livewire\Hrd\Jobs\PublishManage\Index::class)->middleware('checkstaffrecruitment');
// Route::get('/jobs/publish-manage/hrd-info/{id}', \App\Livewire\Hrd\Jobs\PublishManage\HrdInfo::class)->middleware('checkstaffrecruitment');
// Route::get('/jobs/publish-manage/job-info/{id}', \App\Livewire\Hrd\Jobs\PublishManage\JobInfo::class)->middleware('checkstaffrecruitment');
// Route::get('/jobs/{id}/agree', HRDPublishJobAgreeController::class);
// Route::get('/jobs/{id}/disagree', HRDPublishJobDisagreeController::class);
// Route::get('/jobs/{id}/open', HRDJobOpenController::class);
// Route::get('/jobs/{id}/close', HRDJobCloseController::class);
// Route::get('/jobs/{id}/waiting', HRDJobWaitingController::class);

// hrd/profile
// Route::get('/profile', \App\Livewire\Hrd\Profile\Index::class);
// Route::get('/change-password', \App\Livewire\Hrd\Profile\Password::class);
