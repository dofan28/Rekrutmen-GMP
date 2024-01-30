<?php
namespace App\Models\Traits\JobCompany;

use App\Models\Job;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait JobCompanyRelationship{
    public function job() : HasMany
    {
        return $this->hasMany(Job::class, 'jobcompany_id');
    }
}
