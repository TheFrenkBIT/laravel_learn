<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    //
    public function __invoke(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('post.index');
        // TODO: Implement __invoke() method.
    }
}
