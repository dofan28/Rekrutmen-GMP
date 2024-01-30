<?php

namespace App\Livewire\Hrd\Jobs\PublishManage;

use App\Models\HrdData;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Data HRD | HRD - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class HrdInfo extends Component
{
    public HrdData $hrddata;
    public function render()
    {
        return view('livewire.hrd.jobs.publish-manage.hrd-info');
    }
}
