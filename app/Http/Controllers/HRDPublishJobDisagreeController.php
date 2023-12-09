<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HRDPublishJobDisagreeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        Job::find($id)->update(["status" => 0, 'confirm' => 0]);

        return redirect("/hrd/jobs/publish-manage")->with(
            "success",
            "Lowongan ditolak."
        );
    }
}
