<?php

use App\Http\Controllers\AdminJobDeleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminActivityLogDeleteController;
use App\Http\Controllers\AdminApplicantDeleteController;
use App\Http\Controllers\AdminHRDDeleteController;
use App\Http\Controllers\AdminRecycleBinHRDController;
use App\Http\Controllers\AdminRecycleBinJobController;
use App\Http\Controllers\AdminRecycleBinApplicantController;
use App\Http\Controllers\AdminRecycleBinJobCompanyController;
use App\Http\Controllers\AdminRecycleBinApplicationController;
use App\Http\Controllers\AdminRecycleBinJobEducationController;

// admin
// admin/dashboard
Route::get('/dashboard', \App\Livewire\Admin\Dashboard\Index::class);

// admin/jobs
Route::get('/jobs', \App\Livewire\Admin\Jobs\Index::class);
Route::get('/jobs/{id}', \App\Livewire\Admin\Jobs\Show::class);
Route::delete('/jobs/{id}', AdminJobDeleteController::class);

// // admin/jobcompanies
Route::get('/jobcompanies', \App\Livewire\Admin\Jobs\Jobcompanies\Index::class);
Route::get('/jobcompanies/create', \App\Livewire\Admin\Jobs\Jobcompanies\Create::class);
Route::get('/jobcompanies/{id}/edit', \App\Livewire\Admin\Jobs\Jobcompanies\Edit::class);
// admin/jobeducations
Route::get('/jobeducations', \App\Livewire\Admin\Jobs\Jobeducations\Index::class);
Route::get('/jobeducations/create', \App\Livewire\Admin\Jobs\Jobeducations\Create::class);
Route::get('/jobeducations/{id}/edit', \App\Livewire\Admin\Jobs\Jobeducations\Edit::class);


// admin/applicants
Route::get('/applicants', \App\Livewire\Admin\Applicants\Index::class);
Route::delete('/applicants/{id}', AdminApplicantDeleteController::class);


// // admin/applications
Route::get('/applications', \App\Livewire\Admin\Applications\Index::class);
Route::delete('/applications/{id}', AdminApplicantDeleteController::class);

// // admin/hrd
Route::get('/hrds', \App\Livewire\Admin\Hrd\Index::class);
Route::get('/hrds/create', \App\Livewire\Admin\Hrd\Create::class);
Route::get('/hrds/{id}', \App\Livewire\Admin\Hrd\Show::class);
Route::delete('/hrds/{id}', AdminHRDDeleteController::class);

// admin/others
Route::get('/others', \App\Livewire\Admin\Others\Index::class);

// admin/others/activitylogs
Route::get('/others/activitylogs', \App\Livewire\Admin\Others\Activitylog\Index::class);
Route::get('/others/activitylog/{id}/role', \App\Livewire\Admin\Others\Activitylog\Role::class);
Route::get('/others/activitylog/{id}/subject', \App\Livewire\Admin\Others\Activitylog\Subject::class);
Route::get('/others/activitylog/{id}/addinfo', \App\Livewire\Admin\Others\Activitylog\Addinfo::class);
Route::delete('/others/activitylog/{id}/delete', AdminActivityLogDeleteController::class);

// admin/others/recyclebin
Route::get('/others/recyclebin', \App\Livewire\Admin\Others\Recyclebin\Index::class);
// admin/others/recycleBin/applicants
Route::get('/others/recyclebin/applicants', \App\Livewire\Admin\Others\Recyclebin\Applicants\Index::class);
Route::get('/others/recyclebin/applicants/{applicant}/restore', [AdminRecycleBinApplicantController::class, 'restore'])->withTrashed();
Route::delete('/others/recyclebin/applicants/{applicant}/force', [AdminRecycleBinApplicantController::class, 'forceDelete']);
// admin/others/recyclebin/jobs
Route::get('/others/recyclebin/jobs', \App\Livewire\Admin\Others\Recyclebin\Jobs\Index::class);
Route::get('/others/recyclebin/jobs/{job}/restore', [AdminRecycleBinJobController::class, 'restore'])->withTrashed();
Route::delete('/others/recyclebin/jobs/{job}/force', [AdminRecycleBinJobController::class, 'forceDelete'])->name('forceDelete');
// admin/others/recyclebin/jobs/jobcompanies
Route::get('/others/recyclebin/jobs/jobcompanies', \App\Livewire\Admin\Others\Recyclebin\Jobs\Jobcompanies\Index::class);
Route::get('/others/recyclebin/jobs/jobcompanies/{jobcompany}/restore', [AdminRecycleBinJobCompanyController::class, 'restore'])->withTrashed();
Route::delete('/others/recyclebin/jobs/jobcompanies/{jobcompany}/force', [AdminRecycleBinJobCompanyController::class, 'forceDelete'])->name('forceDelete');
// admin/others/recyclebin/jobs/jobeducations
Route::get('/others/recyclebin/jobs/jobeducations', \App\Livewire\Admin\Others\Recyclebin\Jobs\Jobeducations\Index::class);
Route::get('/others/recyclebin/jobs/jobeduactions/{jobeducation}/restore', [AdminRecycleBinJobEducationController::class, 'restore'])->withTrashed();
Route::delete('/others/recyclebin/jobs/jobeducations/{jobeducation}/force', [AdminRecycleBinJobEducationController::class, 'forceDelete'])->name('forceDelete');
// admin/others/recyclebin/applications
Route::get('/others/recyclebin/applications', \App\Livewire\Admin\Others\Recyclebin\Applications\Index::class);
Route::get('/others/recyclebin/applications/{application}/restore', [AdminRecycleBinApplicationController::class, 'restore'])->withTrashed();
Route::delete('/others/recyclebin/applications/{application}/force', [AdminRecycleBinApplicationController::class, 'forceDelete']);

// admin/others/recyclebin/hrds
Route::get('/others/recyclebin/hrds', \App\Livewire\Admin\Others\Recyclebin\Hrds\Index::class);
Route::get('/others/recyclebin/hrds/{hrd}/restore', [AdminRecycleBinHRDController::class, 'restore'])->withTrashed();
Route::delete('/others/recyclebin/hrds/{hrd}/force', [AdminRecycleBinHRDController::class, 'forceDelete']);
