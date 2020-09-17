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
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function mount()
    {
        $this->this_url = $this->getUrl();
    }

    public function render()
    {
        return view('livewire.dashboard.user-link', [
            'links' => $this->search==='' 
                ? Link::where('user_id', \Auth::user()->id)->paginate(5) 
                : Link::where('user_id', \Auth::user()->id)
                    ->where('url', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('short_url', 'LIKE', '%'.$this->search.'%')->paginate(10)
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
