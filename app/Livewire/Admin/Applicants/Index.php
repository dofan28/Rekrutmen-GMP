<?php

namespace App\Livewire\Admin\Applicants;

use App\Models\User;
use Livewire\Component;
use App\Models\Applicant;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Data Pelamar")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;

    public function getApplicantData($applicantId)
    {
        $applicant = User::with('applicantdata')->find($applicantId);

        if ($applicant) {
            $applicantData = [
                'ktp_number' => $applicant->applicantdata->ktp_number ?? '',
                'full_name' => $applicant->applicantdata->full_name ?? '',
                'place_of_birth' => $applicant->applicantdata->place_of_birth ?? '',
                'date_of_birth' => $applicant->applicantdata->date_of_birth ?? '',
                'gender' => $applicant->applicantdata->gender ?? '',
                'marital_status' => $applicant->applicantdata->marital_status ?? '',
            ];

            $this->emit('displayApplicantData', $applicantData);
        }
    }
    public function render()
    {
        $applicants = User::when($this->search, function ($query) {
            $query->where('email', 'like', '%' . $this->search . '%')->orWhereHas('applicantdata', function ($applicantdataQuery) {
                $applicantdataQuery->where('ktp_number', 'like', '%' . $this->search . '%')->orWhere('full_name', 'like', '%' . $this->search . '%')->orWhere('place_of_birth', 'like', '%' . $this->search . '%')->orWhere('date_of_birth', 'like', '%' . $this->search . '%')->orWhere('gender', 'like', '%' . $this->search . '%')->orWhere('marital_status', 'like', '%' . $this->search . '%');
            })
                ->orWhereHas('contact', function ($contactQuery) {
                    $contactQuery->where('street', 'like', '%' . $this->search . '%')->orWhere('subdistrict', 'like', '%' . $this->search . '%')->orWhere('city', 'like', '%' . $this->search . '%')->orWhere('province', 'like', '%' . $this->search . '%')->orWhere('postal_code', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->orWhere('phone', 'like', '%' . $this->search . '%')->orWhere('linkedin', 'like', '%' . $this->search . '%')->orWhere('facebook', 'like', '%' . $this->search . '%')->orWhere('instagram', 'like', '%' . $this->search . '%');
                }) ->orWhereHas('educationalbackground', function ($educationalbackgroundQuery) {
                    $educationalbackgroundQuery->where('institution', 'like', '%' . $this->search . '%')->orWhere('major', 'like', '%' . $this->search . '%')->orWhere('start_date', 'like', '%' . $this->search . '%')->orWhere('end_date', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('workexperience', function ($workexperienceQuery) {
                    $workexperienceQuery->where('company', 'like', '%' . $this->search . '%')->orWhere('position', 'like', '%' . $this->search . '%')->orWhere('last_salary', 'like', '%' . $this->search . '%')->orWhere('job_description', 'like', '%' . $this->search . '%')->orWhere('start_date', 'like', '%' . $this->search . '%')->orWhere('end_date', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('organizationalexperience', function ($organizationalexperienceQuery) {
                    $organizationalexperienceQuery->where('organizational_name', 'like', '%' . $this->search . '%')->orWhere('position', 'like', '%' . $this->search . '%')->orWhere('organizational_description', 'like', '%' . $this->search . '%');
                });

        })->get();
        return view('livewire.admin.applicants.index', [
            'applicants' => $applicants
        ]);
    }
}
