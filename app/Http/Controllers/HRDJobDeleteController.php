<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class HRDJobDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        // delete data job, sesuai dengan params
        Job::destroy($id);

        // delete data application, sesuai dengan params
        Application::where('job_id', $id)->delete();

        return redirect('/hrd/jobs')->with('success', 'Lowongan telah dihapus!');
    }
}
