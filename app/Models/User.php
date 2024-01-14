<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, LogsActivity, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    protected $dates = ['deleted_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty()->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }

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

    public function hrddata(): HasOne
    {
        return $this->hasOne(HrdData::class, 'user_id');
    }

    public function application(): HasOne
    {
        return $this->hasOne(Application::class, 'user_id');
    }

}
