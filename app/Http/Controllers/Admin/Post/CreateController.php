<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    //
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::paginate(5);
        return view('admin.post.create', compact('categories', 'tags', 'posts'));
        // TODO: Implement __invoke() method.
    }
}
