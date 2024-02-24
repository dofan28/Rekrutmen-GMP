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

    public $action;
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
            $this->action = 'delete';
            $this->data = $data;
        } elseif ($action == 'reject') {
            $this->icon = '<svg width="64px" height="64px" class="w-6 h-6 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24"><path d="M200-200h560v-560H200v560Zm-80 80v-720h720v720H120Zm216-160 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56Zm-136 80v-560 560Z"/></svg>';
            $this->title = 'Tolak Lamaran';
            $this->description = "Anda yakin menolak <span class='font-semibold'>" . ($identify ? "$identify" : "") . " </span>?";
            $this->action = 'reject';
            $this->data = $data;
        } elseif ($action == 'delete2') {
            $this->icon = '<svg width="64px" height="64px" class="w-6 h-6 fill-red-600"
            xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
            width="24">
            <path
                d="m40-120 440-760 440 760H40Zm138-80h604L480-720 178-200Zm302-40q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Zm40-100Z" />
        </svg>';
            $this->title = 'Hapus Data';
            $this->description = "Anda yakin menghapus data  <span class='font-semibold'>" . ($identify ? "$identify" : "") . " </span>?";
            $this->action = 'delete';
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
                'action' => $this->action,
                'data' => $this->data,
            ]);
        };
    }
}
