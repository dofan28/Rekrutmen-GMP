<?php


use Illuminate\Support\Facades\Route;

// hrd/applications
Route::get('/applications', \App\Livewire\Hrd\Applications\Index::class);
Route::get('/applications/applicant/{application}', \App\Livewire\Hrd\Applications\ApplicantShow::class);
Route::get('/applications/job/{job}', \App\Livewire\Hrd\Applications\JobShow::class);
Route::get('/applications/{application}/accept', \App\Livewire\Hrd\Applications\Accept::class);


// hrd/jobs
Route::get('/jobs', \App\Livewire\Hrd\Jobs\Index::class);
Route::get('/jobs/create', \App\Livewire\Hrd\Jobs\Create::class);
Route::get('/jobs/{job}/edit', \App\Livewire\Hrd\Jobs\Edit::class);
Route::get('/jobs/detail/{job}', \App\Livewire\Hrd\Jobs\Show::class);
Route::get('/jobs/publish-manage', \App\Livewire\Hrd\Jobs\PublishManage\Index::class)->middleware('checkstaffrecruitment');
Route::get('/jobs/publish-manage/hrd-info/{hrddata}', \App\Livewire\Hrd\Jobs\PublishManage\HrdInfo::class)->middleware('checkstaffrecruitment');
Route::get('/jobs/publish-manage/job-info/{job}', \App\Livewire\Hrd\Jobs\PublishManage\JobInfo::class)->middleware('checkstaffrecruitment');



// hrd/profile
Route::get('/profile', \App\Livewire\Hrd\Profile\Index::class);
Route::get('/change-password', \App\Livewire\Hrd\Profile\Password::class);
