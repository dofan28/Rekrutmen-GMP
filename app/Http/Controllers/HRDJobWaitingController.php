<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HRDJobWaitingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $hrd = Auth::guard("hrd")->user();
        if ($hrd->is_recruitment_staff === 0) {
            $this->authorize('jobStatus', Job::find($id));
        }
        Job::find($id)->update(['status' => -1, 'confirm' => null]);

        return redirect('/hrd/jobs')->with('success', 'Tunggu konfirmasi buka lowongan dari Staff Recruitment.');
    }
    }

