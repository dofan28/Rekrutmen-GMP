<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicantData;
use App\Models\ApplicantContact;
use App\Models\ApplicantWorkExperience;
use App\Models\ApplicantEducationalBackground;
use App\Models\ApplicantOrganizationalExperience;
use App\Models\User;

class AdminApplicantDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $applicant = User::find($id);

        ApplicantData::where('user_id', $id)->delete();
        ApplicantContact::where('user_id', $id)->delete();
        ApplicantWorkExperience::where('user_id', $id)->delete();
        ApplicantEducationalBackground::where('user_id', $id)->delete();
        ApplicantOrganizationalExperience::where('user_id', $id)->delete();

        $applicant->delete();

        Application::where('user_id', $id)->delete();
        return back()->with('success', 'Data berhasil dihapus permanen!');
    }
}
