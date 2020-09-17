<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Link;

class RedirectController extends Controller
{
    public function index($short_url)
    {
        $url = Link::whereRaw('BINARY short_url = "' .$short_url. '"')->first();
        if($url) {
            $url->increment('views');
            return redirect($url->url);
        } else {
            return redirect(route('home'));
        }
    }
}
