<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Link;

class Home extends Component
{
    public $url;
    public $custom_url;

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
                $checklink = Link::whereRaw('BINARY short_url = "' .$link->short_url. '"')->first();
            } while ($checklink);
            $link->istransit = 1;
            $link->views = 0;
            $link->save();
            $this->url = $this->getUrl() . $link->short_url;
            $this->custom_url = $link->short_url;
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

    public function customURL()
    {
        $short_url = explode('/', $this->url);
        $short_url = $short_url[count($short_url)-1];
        if($short_url!==$this->custom_url) {
            if ($this->custom_url) {
                $link = Link::whereRaw('BINARY short_url = "' .$short_url. '"')->first();
                if($link) {
                    $check_url = Link::whereRaw('BINARY short_url = "' .$this->custom_url. '"')->first();
                    if(!$check_url) {
                        $link->short_url = $this->custom_url;
                        $link->save();
                        $this->url = $this->getUrl() . $link->short_url;
                        session()->flash('sukses', 'URL Berhasil Diubah!');
                    } else {
                        session()->flash('gagal', 'Gagal, URL sudah Digunakan!');
                    }
                } else {
                    session()->flash('gagal', 'Gagal, URL Tidak Ditemukan!');
                }
            } else {
                session()->flash('gagal', 'Gagal, Masukkan URL terlebih dahulu!');
            }
        } else {
            session()->flash('sama', 'Gagal, URL dan Custom URL tidak boleh sama!');
        }
    }
}
