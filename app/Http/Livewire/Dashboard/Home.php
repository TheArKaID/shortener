<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Link;

class Home extends Component
{
    public $url;

    public function render()
    {
        return view('livewire.dashboard.home')->extends('layouts.main');
    }

    public function short()
    {
        if ($this->url) {
            $link = new Link;
            $link->url = $this->url;
            $link->user_id = \Auth::user()->id;
            $link->name = "";
            do {
                $link->short_url = Str::random(6);
                $checklink = Link::where('short_url', $link->short_url)->first();
            } while ($checklink);
            $link->istransit = 1;
            $link->views = 0;
            $link->save();
            $this->url = $this->getUrl() . $link->short_url;
            session()->flash('sukses', 'URL Berhasil Dipendekkan!');
        } else {
            session()->flash('gagal', 'Gagal, Masukkan URL terlebih dahulu');
        }
    }

    public function getUrl()
    {
        $url = \Request::url();
        $url = explode('/', $url);
        array_pop($url);
        array_pop($url);
        array_pop($url);
        $url = implode('/', $url); 
        return $url.'/';
    }
}
