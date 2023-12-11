<?php

namespace App\Http\Controllers;

use App\Models\JobEducation;
use Illuminate\Http\Request;

class AdminRecycleBinJobEducationController extends Controller
{
    public function index(){
        $jobeducations = JobEducation::onlyTrashed()->get();

        return view("admin.others.recyclebin.jobs.jobeducations.index",[
            "jobeducations"=> $jobeducations,
            "title" => "Tempat Sampah | Data Pendidikan"
        ]);
    }

    public function restore(JobEducation $jobeducation){
        $jobeducation->restore();

        return back()->with('success', 'Data berhasil dipulihkan!');
    }

    public function forceDelete($id){

        JobEducation::where('id', $id)->forceDelete();

        return back()->with('success', 'Data berhasil dihapus permanen!');
    }
}
