<?php
namespace App\Models\Traits\ApplicantEducationalBackgroundRelationship;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ApplicantEducationalBackgroundRelationship
{
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
