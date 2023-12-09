<?php

namespace App\Policies;

use App\Models\User;

class ApplicationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function hrdAcceptReject(Hrd $hrd, Application $application){
        return $hrd->id == $application->job->hrd_id;
    }

    public function applicantConfirm(Applicant $applicant, Application $application){
        return $applicant->id == $application->applicant_id;
    }
}
