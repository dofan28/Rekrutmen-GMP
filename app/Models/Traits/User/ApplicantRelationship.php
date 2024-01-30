<?php

namespace App\Models\Traits\User;

use App\Models\Application;
use App\Models\ApplicantData;
use App\Models\ApplicantContact;
use App\Models\ApplicantWorkExperience;
use App\Models\ApplicantEducationalBackground;
use App\Models\ApplicantOrganizationalExperience;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ApplicantRelationship
{
    public function applicantdata(): HasOne
    {
        return $this->hasOne(ApplicantData::class, 'user_id');
    }

    public function contact(): HasOne
    {
        return $this->hasOne(ApplicantContact::class, 'user_id');
    }

    public function educationalbackground(): HasMany
    {
        return $this->hasMany(ApplicantEducationalBackground::class, 'user_id');
    }

    public function organizationalexperience(): HasMany
    {
        return $this->hasMany(ApplicantOrganizationalExperience::class, 'user_id');
    }

    public function workexperience(): HasMany
    {
        return $this->hasMany(ApplicantWorkExperience::class, 'user_id');
    }

    public function application(): HasOne
    {
        return $this->hasOne(Application::class, 'user_id');
    }
}
