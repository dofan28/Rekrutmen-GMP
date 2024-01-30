<?php

namespace App\Models\Traits\User;

use App\Models\HrdData;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HRDRelationship{

    public function hrddata(): HasOne
    {
        return $this->hasOne(HrdData::class, 'user_id');
    }
}
