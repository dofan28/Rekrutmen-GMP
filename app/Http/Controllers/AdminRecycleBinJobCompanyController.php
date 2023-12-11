<?php

namespace App\Http\Controllers;

use App\Models\JobCompany;
use Illuminate\Http\Request;

class AdminRecycleBinJobCompanyController extends Controller
{
    public function restore(JobCompany $jobcompany){
        $jobcompany->restore();

        return back()->with('success', 'Data berhasil dipulihkan!');
    }

    public function forceDelete($id){

        JobCompany::where('id', $id)->forceDelete();

        return back()->with('success', 'Data berhasil dihapus permanen!');
    }

}
