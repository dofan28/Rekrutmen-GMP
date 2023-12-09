<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AdminActivityLogDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        Activity::where('id', $id)->delete();
        
        return back()->with("success", "Log Aktivitas berhasil dihapus!");
    }
}
