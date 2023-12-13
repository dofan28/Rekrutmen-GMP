<?php

namespace App\Livewire\Admin\Others\Activitylog;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Activitylog\Models\Activity;

#[Title("Log Aktivitas")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;

    public function delete($id){
        Activity::where('id', $id)->delete();

        return back()->with("success", "Log Aktivitas berhasil dihapus!");
    }

    public function render()
    {
        $activitylogs = Activity::query()
            ->where('log_name', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%')->orWhere('event', 'like', '%' . $this->search . '%')->orWhere('properties', 'like', '%' . $this->search . '%')
            ->orWhere('created_at', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.admin.others.activitylog.index', [
            'activitylogs' => $activitylogs
        ]);
    }
}
