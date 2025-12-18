<?php

namespace App\Http\Controllers\Links;

use App\Facades\Sanity;
use App\GroqQueries\Links;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class LinksController extends Controller
{
    protected function getLinksCached()
    {
        return Cache::remember('links_data', 3600, function () {
            return Sanity::fetch(Links::getLinksData());
        });
    }

    public function show()
    {
        $links = $this->getLinksCached();
        // dd($links);

        return view('links.index', compact('links'));
    }
}
