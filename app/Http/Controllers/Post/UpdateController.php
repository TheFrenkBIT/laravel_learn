<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Post $post)
    {
        $data = \request()->validate([
            'name' => 'string',
            'count_of_posts' => 'integer',
            'description' => 'string',
            'category_id' => 'integer',
            'tags' => 'array|nullable'
        ]);
        if (array_key_exists('tags', $data))
        {
            $tags = $data['tags'];
        } else {
            $tags = [];
        }
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
        // TODO: Implement __invoke() method.
    }
}
