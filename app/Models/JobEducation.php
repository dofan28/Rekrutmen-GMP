<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobEducation extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $table = 'job_educations';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }

    public function job() : HasMany
    {
        return $this->hasMany(Job::class, 'jobeducation_id');
    }
}
