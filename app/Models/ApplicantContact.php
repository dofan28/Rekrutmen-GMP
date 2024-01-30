<?php

namespace App\Models;

use App\Models\Traits\ApplicantContact\ApplicantContactRelationship;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantContact extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, ApplicantContactRelationship;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }


    public function getFullAddress()
    {
        return $this->street . ', ' . $this->subdistrict . ', ' . $this->city . ', ' . $this->city . ', ' . $this->province . ', ' . $this->postal_code;
    }
}
