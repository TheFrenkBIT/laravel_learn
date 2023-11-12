<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $posts = Post::paginate(5);
        return view('admin.post.show', compact('post', 'posts'));
        // TODO: Implement __invoke() method.
    }
}
