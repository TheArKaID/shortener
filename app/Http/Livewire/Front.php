<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\Link;
use Illuminate\Support\Str;

class Front extends Component
{
    public $url;
    public $result;

    public function render()
    {
        return view('livewire.front')->extends('layouts.app');
    }

    public function short()
    {
        if ($this->url) {
            $link = new Link;
            $link->url = $this->url;
            $link->user_id = 0;
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

    public function login()
    {
        Cache::put('short_url', $this->url, now()->addMinutes(1000));
        return redirect(route('login'));
        // Cache::pull('short_url')
    }

    public function register()
    {
        Cache::put('short_url', $this->url, now()->addMinutes(1000));
        return redirect(route('register'));
    }
}
