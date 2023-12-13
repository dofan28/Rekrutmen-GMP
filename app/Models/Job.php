<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }

    public function applicant() : HasMany
    {
        return $this->hasMany(User::class, 'job_id');
    }

    public function application() : HasMany
    {
        return $this->hasMany(Application::class, 'job_id');
    }


    public function hrd() : BelongsTo
    {
        return $this->belongsTo(HrdData::class, 'hrd_id');
    }

    public function jobeducation() : BelongsTo
    {
        return $this->belongsTo(JobEducation::class, 'jobeducation_id');
    }

    public function jobcompany() : BelongsTo
    {
        return $this->belongsTo(JobCompany::class, 'jobcompany_id');
    }
}
