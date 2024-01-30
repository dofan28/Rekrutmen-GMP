<?php
namespace App\Models\Traits\ApplicantWorkExperience;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ApplicantWorkExperienceRelationship{
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
