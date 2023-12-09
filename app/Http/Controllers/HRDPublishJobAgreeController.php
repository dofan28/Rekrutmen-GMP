<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HRDPublishJobAgreeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        Job::find($id)->update(["status" => 1, "confirm" => 1]);

        return redirect("/hrd/jobs/publish-manage")->with(
            "success",
            "Lowongan diterima."
        );
    }
}
