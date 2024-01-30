<?php
namespace App\Models\Traits\ApplicantData;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ApplicantDataRelationship
{

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
