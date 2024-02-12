<?php

namespace App\View\Components;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ModalConfirmation extends Component
{
    /**
     * Create a new component instance.
     */

    public $icon;
    public $title;
    public $description;
    public function __construct(string $action = null, $identify = null, public $data = null)
    {

        if ($action == 'delete') {
            $this->icon = '<svg width="64px" height="64px" class="w-6 h-6 fill-red-600"
                xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                width="24">
                <path
                    d="m40-120 440-760 440 760H40Zm138-80h604L480-720 178-200Zm302-40q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Zm40-100Z" />
            </svg>';
            $this->title = 'Hapus Data';
            $this->description = "Anda yakin menghapus data  <span class='font-semibold'>" . ($identify ? "$identify" : "") . " </span>? Data yang Anda hapus dapat dipulihkan kembali.";
            $this->data = $data;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return function () {
            return view('components.modal-confirmation', [
                'icon' => $this->icon,
                'title' => $this->title,
                'description' => $this->description,
                'data' => $this->data,
            ]);
        };
    }
}
