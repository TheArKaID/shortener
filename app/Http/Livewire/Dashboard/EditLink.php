<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Link;

class EditLink extends Component
{
    public $url_id;
    public $url;
    public $short_url;
    public $this_url;

    public function render()
    {
        return view('livewire.dashboard.edit-link', [
            ''
        ])->extends('layouts.main');;
    }

    public function mount($id)
    {
        $link = Link::find($id);
        if($link->user_id!==\Auth::user()->id) {
            return redirect()->to(route('dashboard.link'));
        }

        $this->url_id = $link->id;
        $this->url = $link->url;
        $this->short_url = $link->short_url;
        $this->this_url = $this->getUrl();
    }

    public function getUrl()
    {
        $url = \Request::url();
        $url = explode('/', $url);
        array_pop($url);
        array_pop($url);
        $url = implode('/', $url); 
        return $url.'/';
    }

    public function save()
    {
        $link = Link::find($this->url_id);
        if($link->user_id!==\Auth::user()->id) {
            return redirect()->to(route('dashboard.link'));
        }
        $link->url = $this->url;
        $link->short_url = $this->short_url;
        $link->save();
        
        session()->flash('sukses', 'Berhasil Mengupdate');
        return redirect(route('dashboard.link'));
    }
}
