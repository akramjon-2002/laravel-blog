<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at);

        $relatedPosts = Post::where('id', '!=', $post->id)
            ->whereHas('categories', function ($query) use ($post) {
                $query->where('category_id', $post->category_id);
            })
            ->take(2)
            ->get();

        return view('posts.show', compact('post', 'date', 'relatedPosts'));
    }

}
