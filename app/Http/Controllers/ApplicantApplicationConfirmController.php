<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicantApplicationConfirmController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $this->authorize('applicantConfirm', Application::find($id));

        Application::find($id)->update(['confirm' => 1]);

        return redirect('/applicant/application')->with('success', 'Lamaran telah dikonfirmasi');
    }
}
