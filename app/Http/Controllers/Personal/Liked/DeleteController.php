<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use JetBrains\PhpStorm\NoReturn;


class DeleteController extends Controller
{
    #[NoReturn] public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked.index');

    }
}
