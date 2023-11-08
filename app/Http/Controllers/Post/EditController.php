<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
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
        return view('post.edit', compact('post', 'tags', 'allTags', 'allCategories'));
        // TODO: Implement __invoke() method.
    }
}
