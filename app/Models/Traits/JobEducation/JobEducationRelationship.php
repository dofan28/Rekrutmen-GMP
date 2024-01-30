<?php
namespace App\Models\Traits\JobEducation;

use App\Models\Job;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait JobEducationRelationship
{
    public function job() : HasMany
    {
        return $this->hasMany(Job::class, 'jobeducation_id');
    }
}
