<?php

namespace App\Livewire\Admin\Applicants;

use App\Models\User;
use Livewire\Component;
use App\Models\Application;
use App\Models\ApplicantData;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\ApplicantContact;
use App\Models\ApplicantWorkExperience;
use App\Models\ApplicantEducationalBackground;
use App\Models\ApplicantOrganizationalExperience;

#[Title("Data Pelamar | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;


    public function delete($id)
    {

        ApplicantData::where('user_id', $id)->delete();
        ApplicantContact::where('user_id', $id)->delete();
        ApplicantWorkExperience::where('user_id', $id)->delete();
        ApplicantEducationalBackground::where('user_id', $id)->delete();
        ApplicantOrganizationalExperience::where('user_id', $id)->delete();
        Application::where('user_id', $id)->delete();

        User::where('id', $id)
            ->where('role', 'applicant')
            ->delete();

        session()->flash('success', 'Data pelamar berhasil dihapus.');

    }

    public function render()
    {
        $applicants = User::where('role', 'applicant')
            ->where(function ($query) {
                $query->where('username', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('applicantdata', function ($query) {
                $query->where('ktp_number', 'like', '%' . $this->search . '%')
                    ->orWhere('full_name', 'like', '%' . $this->search . '%')
                    ->orWhere('place_of_birth', 'like', '%' . $this->search . '%')
                    ->orWhere('date_of_birth', 'like', '%' . $this->search . '%')
                    ->orWhere('gender', 'like', '%' . $this->search . '%')
                    ->orWhere('marital_status', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('contact', function ($query) {
                $query->where('street', 'like', '%' . $this->search . '%')
                    ->orWhere('subdistrict', 'like', '%' . $this->search . '%')
                    ->orWhere('city', 'like', '%' . $this->search . '%')
                    ->orWhere('province', 'like', '%' . $this->search . '%')
                    ->orWhere('postal_code', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('linkedin', 'like', '%' . $this->search . '%')
                    ->orWhere('facebook', 'like', '%' . $this->search . '%')
                    ->orWhere('instagram', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('educationalbackground', function ($query) {
                $query->where('institution', 'like', '%' . $this->search . '%')
                    ->orWhere('major', 'like', '%' . $this->search . '%')
                    ->orWhere('title', 'like', '%' . $this->search . '%')
                    ->orWhere('start_date', 'like', '%' . $this->search . '%')
                    ->orWhere('end_date', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('workexperience', function ($query) {
                $query->where('company', 'like', '%' . $this->search . '%')
                    ->orWhere('position', 'like', '%' . $this->search . '%')
                    ->orWhere('last_salary', 'like', '%' . $this->search . '%')
                    ->orWhere('job_description', 'like', '%' . $this->search . '%')
                    ->orWhere('start_date', 'like', '%' . $this->search . '%')
                    ->orWhere('end_date', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('organizationalexperience', function ($query) {
                $query->where('organizational_name', 'like', '%' . $this->search . '%')
                    ->orWhere('position', 'like', '%' . $this->search . '%')
                    ->orWhere('organizational_description', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.admin.applicants.index', [
            'applicants' => $applicants
        ]);
    }
}
