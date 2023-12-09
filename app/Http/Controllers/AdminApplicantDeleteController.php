<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicantData;
use App\Models\ApplicantContact;
use App\Models\ApplicantWorkExperience;
use App\Models\ApplicantEducationalBackground;
use App\Models\ApplicantOrganizationalExperience;

class AdminApplicantDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $applicant = Applicant::find($id);

        ApplicantData::where('applicant_id', $id)->delete();
        ApplicantContact::where('applicant_id', $id)->delete();
        ApplicantWorkExperience::where('applicant_id', $id)->delete();
        ApplicantEducationalBackground::where('applicant_id', $id)->delete();
        ApplicantOrganizationalExperience::where('applicant_id', $id)->delete();

        $applicant->delete();

        Application::where('applicant_id', $id)->delete();
        return back()->with('success', 'Data berhasil dihapus permanen!');
    }
}
