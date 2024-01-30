<?php

namespace App\Models;

use App\Models\Traits\HrdData\HrdDataRelationship;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HrdData extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, HrdDataRelationship;

    protected $dates = ['deleted_at'];

    protected $guard = 'hrd';
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }



}
