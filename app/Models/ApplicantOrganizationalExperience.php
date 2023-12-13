<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantOrganizationalExperience extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
