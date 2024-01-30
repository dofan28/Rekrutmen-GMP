<?php

namespace App\Models;

use App\Models\Traits\ApplicantEducationalBackgroundRelationship\ApplicantEducationalBackgroundRelationship;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantEducationalBackground extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, ApplicantEducationalBackgroundRelationship;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }

}
