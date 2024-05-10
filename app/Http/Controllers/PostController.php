<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $post = Post::with('tags')->where('slug', $slug)->firstOrFail();
        // You can access tags directly via the `tags` relationship
        $tags = $post->tags; // This will be a collection of Tag models

        return view('post.show', compact('post', 'tags'));
    }
}
