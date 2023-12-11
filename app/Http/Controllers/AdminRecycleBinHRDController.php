<?php

namespace App\Http\Controllers;

use App\Models\Hrd;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRecycleBinHRDController extends Controller
{
    public function restore(Hrd $hrd)
    {
        $hrd->restore();

        $jobs = Job::withTrashed()->where('hrd_id', $hrd->id)->get();
        foreach ($jobs as $job) {
            $job->restore();

            Application::withTrashed()->where('job_id', $job->id)->restore();
        }

        return back()->with("success", "Data telah dipulihkan.");
    }


    public function forceDelete($id)
    {
        $hrd = Hrd::onlyTrashed()->find($id);

        if ($hrd->photo && $hrd->photo != 'images/hrd/profile/default.jpg') {
            Storage::delete($hrd->photo);
        }

        $hrd->forceDelete();
        $jobs = Job::where('hrd_id', $hrd->id)->get();
        foreach ($jobs as $job) {
            Application::where('job_id', $job->id)->forceDelete();
        }
        Job::where('hrd_id', $hrd->id)->forceDelete();

        return back()->with('success', 'Data berhasil dihapus permanen.');
    }
}
