<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminRecycleBinApplicationController extends Controller
{
    public function restore(Application $application){
        $application->restore();

        return back()->with('success', 'Data berhasil dipulihkan!');
    }

    public function forceDelete($id){
        Application::where('id', $id)->forceDelete();
        
        return back()->with('success', 'Data berhasil dihapus permanen!');
    }
}
