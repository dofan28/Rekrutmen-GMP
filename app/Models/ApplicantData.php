<?php

namespace App\Models;

use App\Models\Traits\ApplicantData\ApplicantDataRelationship;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantData extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, ApplicantDataRelationship;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }

    public function getPlaceDateBirth()
    {
        return $this->place_of_birth . ', ' . $this->date_of_birth;
    }
    
}
