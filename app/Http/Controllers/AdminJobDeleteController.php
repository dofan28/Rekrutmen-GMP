<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminJobDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        Job::destroy($id);
        Application::where('job_id', $id)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
