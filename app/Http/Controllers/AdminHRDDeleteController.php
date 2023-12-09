<?php

namespace App\Http\Controllers;

use App\Models\Hrd;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminHRDDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $hrd = Hrd::find($id);

        $hrd->delete();
        $jobs = Job::where('hrd_id', $hrd->id)->get();
        foreach($jobs as $job){
            Application::where('job_id', $job->id)->delete();
        }
        Job::where('hrd_id', $hrd->id)->delete();

        return back()->with("success", "Data berhasil dihapus.");
    }
}
