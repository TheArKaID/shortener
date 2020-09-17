<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Link;

class UserLink extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $this_url;

    public function mount()
    {
        $this->this_url = $this->getUrl();
    }

    public function render()
    {
        return view('livewire.dashboard.user-link', [
            'links' => Link::where('user_id', \Auth::user()->id)->paginate(10)
        ])->extends('layouts.main');
    }
        
    public function getUrl()
    {
        $url = \Request::url();
        $url = explode('/', $url);
        array_pop($url);
        $url = implode('/', $url); 
        return $url.'/';
    }
}
