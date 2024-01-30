<?php

namespace App\Models;

use App\Models\Traits\JobEducation\JobEducationRelationship;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobEducation extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, JobEducationRelationship;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $table = 'job_educations';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }


}
