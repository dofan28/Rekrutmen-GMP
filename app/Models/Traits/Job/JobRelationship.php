<?php
namespace App\Models\Traits\Job;

use App\Models\User;
use App\Models\HrdData;
use App\Models\JobCompany;
use App\Models\Application;
use App\Models\JobEducation;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait JobRelationship{
    public function applicant(): HasMany
    {
        return $this->hasMany(User::class, 'job_id');
    }

    public function application(): HasMany
    {
        return $this->hasMany(Application::class, 'job_id');
    }


    public function hrddata(): BelongsTo
    {
        return $this->belongsTo(HrdData::class, 'hrd_id');
    }

    public function jobeducation(): BelongsTo
    {
        return $this->belongsTo(JobEducation::class, 'jobeducation_id');
    }

    public function jobcompany(): BelongsTo
    {
        return $this->belongsTo(JobCompany::class, 'jobcompany_id');
    }
}
