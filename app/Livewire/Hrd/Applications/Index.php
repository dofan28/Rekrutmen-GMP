<?php

namespace App\Livewire\Hrd\Applications;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

#[Title("Mengelola Lamaran")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    use WithPagination;

    public $search;

    public function reject($id){
        // $this->authorize("hrdAcceptReject", Application::find($id));

        Application::find($id)->update(["status" => 0]);

        return back()->with('success', 'Lamaran telah ditolak!');

    }
    public function render()
    {
        $applications = Application::whereHas("job", function ($query) {
            $query->where("hrd_id", Auth::user()->hrddata->id);
        })->when($this->search, function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->where('applicant_letter', 'like', '%' . $this->search . '%')->orWhere('company_letter', 'like', '%' . $this->search . '%' )->orWhereHas('applicant', function ($applicantQuery) {
                    $applicantQuery->where('username', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->orWhereHas('applicantdata', function ($applicantdataQuery) {
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
                })
                    ->orWhereHas('job', function ($jobQuery) {
                        $jobQuery->where(function ($subJobQuery) {
                            $subJobQuery->where('position', 'like', '%' . $this->search . '%')
                                ->orWhere('jobdesk', 'like', '%' . $this->search . '%')
                                ->orWhere('description', 'like', '%' . $this->search . '%')
                                ->orWhereHas('jobcompany', function ($companyQuery) {
                                    $companyQuery->where('name', 'like', '%' . $this->search . '%')
                                        ->orWhere('address', 'like', '%' . $this->search . '%');
                                })
                                ->orWhereHas('jobeducation', function ($educationQuery) {
                                    $educationQuery->where('name', 'like', '%' . $this->search . '%');
                                })->orWhereHas('jobeducation', function ($educationQuery) {
                                    $educationQuery->where('name', 'like', '%' . $this->search . '%');
                                });
                        });
                    });
            });
        })
        ->latest()
        ->get();
        return view('livewire.hrd.applications.index',[
            'applications' => $applications,
        ]);
    }
}
