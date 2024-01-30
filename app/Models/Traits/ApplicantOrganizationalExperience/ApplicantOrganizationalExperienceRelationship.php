<?php
namespace App\Models\Traits\ApplicantOrganizationalExperience;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ApplicantOrganizationalExperienceRelationship
{

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
