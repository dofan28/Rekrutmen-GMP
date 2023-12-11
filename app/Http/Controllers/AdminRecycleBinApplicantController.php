<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\ApplicantData;
use App\Models\ApplicantContact;
use App\Models\ApplicantWorkExperience;
use App\Models\ApplicantEducationalBackground;
use App\Models\ApplicantOrganizationalExperience;

class AdminRecycleBinApplicantController extends Controller
{
    public function restore(Applicant $applicant){

        ApplicantData::withTrashed()->where('applicant_id', $applicant->id)->restore();
        ApplicantContact::withTrashed()->where('applicant_id', $applicant->id)->restore();
        ApplicantWorkExperience::withTrashed()->where('applicant_id', $applicant->id)->restore();
        ApplicantEducationalBackground::withTrashed()->where('applicant_id', $applicant->id)->restore();
        ApplicantOrganizationalExperience::withTrashed()->where('applicant_id', $applicant->id)->restore();

        $applicant->restore();

        return back()->with('success', 'Data pelamar berhasil dipulihkan!');
    }


    public function forceDelete($id){

        ApplicantData::where('applicant_id', $id)->forceDelete();
        ApplicantContact::where('applicant_id', $id)->forceDelete();
        ApplicantWorkExperience::where('applicant_id', $id)->forceDelete();
        ApplicantEducationalBackground::where('applicant_id', $id)->forceDelete();
        ApplicantOrganizationalExperience::where('applicant_id', $id)->forceDelete();

        Applicant::where('id', $id)->forceDelete();
        return back()->with('success', 'Data pelamar berhasil dihapus secara permanen!');
    }

}
