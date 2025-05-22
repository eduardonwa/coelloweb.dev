<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class GraciasController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->where('active', 1)
            ->take(4)
            ->get();

        return view('gracias', compact('posts'));
    }
}
