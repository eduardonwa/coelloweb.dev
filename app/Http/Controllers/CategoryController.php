<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        // eager load categories with posts
        $categories = Category::with(['posts' => function ($query) {
        // closure limits the number of posts to 3 and returns distinct values
            $query->distinct()->limit(3);
        }])->get();
        $metaName = Category::where('name');

        // Attach thumbnails for posts
        $this->attachThumbnailUrls($categories);

        return view('categories.index', compact('categories'));
    }

        /**
     * display the posts from the given "category id"
     */
    public function show(string $slug)
    {
        // return a single category object with the 'posts' method
        // the closure ensures only "active" posts are returned
        $category = Category::with(['posts' => function ($query) {
            $query->where('active', 1);
        }])
        // the closure counts the number of "active" posts
            ->withCount(['posts' => function ($query) {
                $query->where('active', 1);
        }])
        // match the slug of the category, else throw a 404
            ->where('slug', $slug)
            ->firstOrFail();

        // Attach thumbnails for posts
        $this->attachThumbnailUrls(collect([$category]));

        return view('categories.show', compact('category'));
    }

    /**
     * Attach thumbnail URLs to posts in a collection of categories.
     *
     * @param \Illuminate\Support\Collection $categories
     * @return void
     */
    private function attachThumbnailUrls($categories)
    {
        $categories->each(function ($category) {
            $category->posts->each(function ($post) {
                $post->thumbnail_url = Storage::url($post->thumbnail);
            });
        });
    }
}
