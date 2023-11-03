<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }
    public function store(){
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
    }
    public function show(Post $post){
        return view('post.show', compact('post'));
    }
    public function edit($id){
        $post = Post::find($id);
        $tags = $post->tags;
        $allTags = Tag::all();
        $allCategories = Category::all();
        return view('post.edit', compact('post', 'tags', 'allTags', 'allCategories'));
    }
    public function update(Post $post){
        //$post = Post::findOrFail($id);
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
    }
    public function destroy(Post $post){
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('post.index');
    }
    public function tailwind(){
        return view('main');
    }
}
