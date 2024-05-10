<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        $lastPost = Post::with('category')
            ->latest()
            ->take(1)
            ->where('active', '=', 1)
            ->get();

        $secondLast = Post::with('category')
            ->latest()
            ->where('active', '=', 1)
            ->take(1)
            ->skip(1)
            ->get();

        $recentPosts = Post::postedWithinDays(14)
            ->latest()
            ->where('active', '=', 1)
            ->take(2)
            ->skip(2)
            ->get();

        $popularPosts = Post::postedWithinDays(30)
            ->latest()
            ->where('active', '=', 1)
            ->take(2)
            ->skip(4)
            ->with('category')
            ->get();

        $morePosts = Post::postedWithinDays(30)
            ->latest()
            ->where('active', '=', 1)
            ->take(2)
            ->skip(6)
            ->withCount('category')
            ->get();

        return view('blog', compact('lastPost', 'secondLast', 'recentPosts', 'popularPosts', 'morePosts'));
    }
}
