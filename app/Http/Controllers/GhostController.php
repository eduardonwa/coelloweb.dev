<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class GhostController extends Controller
{
    public function index() {
        return view('ghost.index');
    }

    public function gracias() {
        $ultimosDos = Post::latest()
            ->take(2)
            ->where('active', '=', 1)
            ->get();

        return view('ghost.gracias', compact('ultimosDos'));
    }
}
