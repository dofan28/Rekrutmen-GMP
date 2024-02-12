<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */


    public $icon;
    public $styles;
    public $styles2;

    public function __construct(string $type, public $message)
    {
        if ($type == 'success') {
            $this->icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="#16a34a"  height="24" viewBox="0 -960 960 960" width="24"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>';
            $this->styles = 'bg-green-200 border-green-600 text-green-600';
            $this->styles2 = 'bg-green-100';
        } elseif ($type == 'error') {
            $this->icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="#dc2626" height="24" viewBox="0 -960 960 960" width="24" ><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" /></svg>';
            $this->styles = 'bg-red-200 border-red-600 text-red-600 ';
            $this->styles2 = 'bg-red-100';
        } elseif ($type == 'warning') {
            $this->icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="#ca8a04" height="24" viewBox="0 -960 960 960" width="24"><path d="m40-120 440-760 440 760H40Zm138-80h604L480-720 178-200Zm302-40q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Zm40-100Z"/></svg>';
            $this->styles = 'bg-yellow-200 border-yellow-600 text-yellow-600 ';
            $this->styles2 = 'bg-yellow-100';
        } elseif ($type == 'info') {
            $this->icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="#2563eb" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>';
            $this->styles = 'bg-blue-200 border-blue-600 text-blue-600 ';
            $this->styles2 = 'bg-blue-100';
        }
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
