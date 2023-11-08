<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
        // TODO: Implement __invoke() method.
    }
}
