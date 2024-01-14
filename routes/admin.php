<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRecycleBinHRDController;
use App\Http\Controllers\AdminRecycleBinJobController;
use App\Http\Controllers\AdminRecycleBinApplicantController;
use App\Http\Controllers\AdminRecycleBinJobCompanyController;
use App\Http\Controllers\AdminRecycleBinApplicationController;
use App\Http\Controllers\AdminRecycleBinJobEducationController;

// admin
// admin/dashboard
Route::get('/dashboard', \App\Livewire\Admin\Dashboard\Index::class)->name('admin.dashboard');

// admin/jobs
Route::get('/jobs', \App\Livewire\Admin\Jobs\Index::class)->name('admin.jobs.index');
Route::get('/jobs/{job}', \App\Livewire\Admin\Jobs\Show::class)->name('admin.jobs.show');

// admin/jobcompanies
Route::get('/jobcompanies', \App\Livewire\Admin\Jobs\Jobcompanies\Index::class)->name('admin.jobcompanies.index');
Route::get('/jobcompanies/create', \App\Livewire\Admin\Jobs\Jobcompanies\Create::class)->name('admin.jobs.create');
Route::get('/jobcompanies/{jobcompany}/edit', \App\Livewire\Admin\Jobs\Jobcompanies\Edit::class)->name('admin.jobs.edit');
// admin/jobeducations
Route::get('/jobeducations', \App\Livewire\Admin\Jobs\Jobeducations\Index::class)->name('admin.jobeducations.index');
Route::get('/jobeducations/create', \App\Livewire\Admin\Jobs\Jobeducations\Create::class)->name('admin.jobeducations.create');
Route::get('/jobeducations/{jobeducation}/edit', \App\Livewire\Admin\Jobs\Jobeducations\Edit::class)->name('admin.jobeducations.edit');


// admin/applicants
Route::get('/applicants', \App\Livewire\Admin\Applicants\Index::class)->name('admin.applicants.index');
Route::get('/applicant/applicantdata/{applicantdata}', \App\Livewire\Admin\Applicants\ApplicantData::class)->name('admin.applicants.applicantdata');
Route::get('/applicant/contact/{applicantcontact}', \App\Livewire\Admin\Applicants\Contact::class)->name('admin.applicants.contact');
Route::get('/applicant/workexperience/{applicant}', \App\Livewire\Admin\Applicants\WorkExperience::class)->name('admin.applicants.workexperience');
Route::get('/applicant/educationalbackground/{applicant}', \App\Livewire\Admin\Applicants\EducationalBackground::class)->name('admin.applicants.educationalbackground');
Route::get('/applicant/organizationalexperience/{applicant}', \App\Livewire\Admin\Applicants\OrganizationalExperience::class)->name('admin.applicants.organizationalexperience');


// admin/applications
Route::get('/applications', \App\Livewire\Admin\Applications\Index::class)->name('admin.applications.index');
Route::get('/applications/{application}', \App\Livewire\Admin\Applications\ApplicationShow::class)->name('admin.applications.show');
Route::get('/applications/applicant/{applicant}', \App\Livewire\Admin\Applications\ApplicantShow::class)->name('admin.applications.applicant.show');
Route::get('/applications/job/{job}', \App\Livewire\Admin\Applications\JobShow::class)->name('admin.applications.job.show');

// admin/hrd
Route::get('/hrds', \App\Livewire\Admin\Hrd\Index::class)->name('admin.hrds.index');
Route::get('/hrds/create', \App\Livewire\Admin\Hrd\Create::class)->name('admin.hrds.create');
Route::get('/hrds/{id}', \App\Livewire\Admin\Hrd\Show::class)->name('admin.hrds.show');

// admin/others
Route::get('/others', \App\Livewire\Admin\Others\Index::class)->name('admin.others.index');

// admin/others/activitylogs
Route::get('/others/activitylogs', \App\Livewire\Admin\Others\Activitylog\Index::class)->name('admin.others.activitylogs.index');
Route::get('/others/activitylog/{role}/role', \App\Livewire\Admin\Others\Activitylog\Role::class)->name('admin.others.activitylogs.role');
Route::get('/others/activitylog/{subject}/subject', \App\Livewire\Admin\Others\Activitylog\Subject::class)->name('admin.others.activitylogs.subject');
Route::get('/others/activitylog/{addinfo}/addinfo', \App\Livewire\Admin\Others\Activitylog\Addinfo::class)->name('admin.others.activitylogs.addinfo');

// admin/others/recyclebin
Route::get('/others/recyclebin', \App\Livewire\Admin\Others\Recyclebin\Index::class)->name('admin.others.recyclebin.index');
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
