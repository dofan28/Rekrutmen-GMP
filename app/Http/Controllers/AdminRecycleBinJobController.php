<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRecycleBinJobController extends Controller
{
    public function restore(Job $job)
    {
        $job->restore();
        Application::where('job_id', $job->id)->restore();

        return back()->with('success', 'Data berhasil dipulihkan!');
    }

    public function forceDelete($id)
    {
        $job = Job::onlyTrashed()->find($id);

        if ($job->image && $job->photo != 'images/hrd/job/default.jpg') {
            Storage::delete($job->image);
        }

        $job->forceDelete();
        Application::where('job_id', $job->id)->delete();

        return back()->with('success', 'Data berhasil dihapus permanen!');
    }
}
