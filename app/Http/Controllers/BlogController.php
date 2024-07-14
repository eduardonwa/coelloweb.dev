<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
            ->take(2)
            ->skip(1)
            ->get();

        $featured = Post::latest()
            ->where('active', '=', 1)
            ->take(1)
            ->skip(3)
            ->get();

        $morePosts = Post::latest()
            ->where('active', '=', 1)
            ->take(4)
            ->skip(4)
            ->with('category')
            ->get();

        $categories = Category::take(3)->get();

        return view('blog', compact('lastPost', 'secondLast', 'featured', 'morePosts', 'categories'));
    }
}
