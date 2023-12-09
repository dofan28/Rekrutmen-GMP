<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminApplicationDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        Application::find($id)->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
