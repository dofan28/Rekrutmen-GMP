<?php


use Illuminate\Support\Facades\Route;

// hrd/applications
Route::get('/applications', \App\Livewire\Hrd\Applications\Index::class)->name('hrd.applications.index');
Route::get('/applications/applicant/{application}', \App\Livewire\Hrd\Applications\ApplicantShow::class)->name('hrd.applications.applicantshow');
Route::get('/applications/job/{job}', \App\Livewire\Hrd\Applications\JobShow::class)->name('hrd.applications.jobshow');
Route::get('/applications/{application}/accept', \App\Livewire\Hrd\Applications\Accept::class)->name('hrd.applications.accept');


// hrd/jobs
Route::get('/jobs', \App\Livewire\Hrd\Jobs\Index::class)->name('hrd.jobs.index');
Route::get('/jobs/create', \App\Livewire\Hrd\Jobs\Create::class)->name('hrd.jobs.create');
Route::get('/jobs/{job}/edit', \App\Livewire\Hrd\Jobs\Edit::class)->name('hrd.jobs.edit');
Route::get('/jobs/detail/{job}', \App\Livewire\Hrd\Jobs\Show::class)->name('hrd.jobs.show');
Route::get('/jobs/publish-manage', \App\Livewire\Hrd\Jobs\PublishManage\Index::class)->name('hrd.jobs.publish-manage.index')->middleware('checkstaffrecruitment');
Route::get('/jobs/publish-manage/hrd-info/{hrddata}', \App\Livewire\Hrd\Jobs\PublishManage\HrdInfo::class)->name('hrd.jobs.publish-manage.hrdinfo')->middleware('checkstaffrecruitment');
Route::get('/jobs/publish-manage/job-info/{job}', \App\Livewire\Hrd\Jobs\PublishManage\JobInfo::class)->name('hrd.jobs.publish-manage.jobinfo')->middleware('checkstaffrecruitment');



// hrd/profile
Route::get('/profile', \App\Livewire\Hrd\Profile\Index::class)->name('hrd.profile.index');
Route::get('/change-password', \App\Livewire\Hrd\Profile\Password::class)->name('hrd.profile.change-password');
