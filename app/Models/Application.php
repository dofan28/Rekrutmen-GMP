<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
        // Chain fluent methods for configuration options
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
