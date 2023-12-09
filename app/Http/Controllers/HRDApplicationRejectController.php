<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class HRDApplicationRejectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $this->authorize("hrdAcceptReject", Application::find($id));

        Application::find($id)->update(["status" => 0]);

        return redirect("/hrd/applications")->with(
            "success",
            "Lamaran telah ditolak!."
        );
    }
}
