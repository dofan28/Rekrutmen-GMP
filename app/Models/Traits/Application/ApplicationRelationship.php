<?php
namespace App\Models\Traits\Application;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ApplicationRelationship{
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
