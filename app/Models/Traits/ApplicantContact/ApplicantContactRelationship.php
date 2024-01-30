<?php
namespace App\Models\Traits\ApplicantContact;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ApplicantContactRelationship
{
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
