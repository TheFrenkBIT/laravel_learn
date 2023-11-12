<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke($id)
    {
        $post = Post::find($id);
        $tags = $post->tags;
        $allTags = Tag::all();
        $allCategories = Category::all();
        $posts = Post::paginate(5);
        return view('admin.post.edit', compact('post', 'tags', 'allTags', 'allCategories', 'posts'));
        // TODO: Implement __invoke() method.
    }
}
