<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link;
use Illuminate\Support\Str;

class Front extends Component
{
    public $url;
    public $result;

    public function render()
    {
        return view('livewire.front');
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
            session()->flash('result', 'URL Berhasil Dipendekkan!');
        } else {
            session()->flash('result', 'Gagal, Masukkan URL terlebih dahulu');
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
