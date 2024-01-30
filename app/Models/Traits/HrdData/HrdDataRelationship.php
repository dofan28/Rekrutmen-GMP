<?php
namespace App\Models\Traits\HrdData;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HrdDataRelationship{
    public function hrd(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job(): HasMany
    {
        return $this->hasMany(Job::class, 'hrd_id');
    }
}
