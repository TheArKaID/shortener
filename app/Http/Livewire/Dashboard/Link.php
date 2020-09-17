<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Link extends Component
{
    public function render()
    {
        return view('livewire.dashboard.link')->extends('layouts.main');
    }
}
