<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function update($post, $data)
    {
        if (array_key_exists('tags', $data))
        {
            $tags = $data['tags'];
        } else {
            $tags = [];
        }
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return $post;
    }
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return $post->fresh();
    }
}
