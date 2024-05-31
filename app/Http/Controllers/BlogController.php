<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        $lastPost = Post::with('category')
            ->where('active', '=', 1)
            ->take(1)
            ->latest()
            ->get();

        $secondLast = Post::with('category')
            ->where('active', '=', 1)
            ->take(1)
            ->skip(1)
            ->get();

        $recentPosts = Post::where('active', '=', 1)
            ->take(2)
            ->skip(2)
            ->get();

        $popularPosts = Post::where('active', '=', 1)
            ->take(2)
            ->skip(4)
            ->get();

        $morePosts = Post::with('category')
            ->where('active', '=', 1)
            ->take(2)
            ->skip(6)
            ->get();

        return view('blog', compact('lastPost', 'secondLast', 'recentPosts', 'popularPosts', 'morePosts'));
    }
}
