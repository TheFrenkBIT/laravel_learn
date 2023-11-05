<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = \request()->validate([
            'name' => 'required|string',
            'count_of_posts' => 'required|integer',
            'description' => 'string',
            'category_id' => 'required|integer',
            'tags' => 'array'
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
        // TODO: Implement __invoke() method.
    }
}
