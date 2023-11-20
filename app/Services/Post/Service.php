<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function update($post, $data)
    {
        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);
            $tagIds = $this->getTagIdsWithUpdate($tags);

            $data['category_id'] = $this->getCategoryIdWithUpdate($category);
            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post->fresh();
    }
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);

            $post = Post::create($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }
    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag)
        {
            $tagIds[] = !isset($tag['id']) ? Tag::create($tag)->id : Tag::find($tag['id'])->id;
        }
        return $tagIds;
    }
    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag)
        {
            if (!isset($tag['id']))
            {
                $tag = Tag::create($tag);
                $tagIds[] = $tag->id;
                continue;
            }
            $currentTag = Tag::find($tag['id']);
            $currentTag->update($tag);
            $tag = $currentTag->fresh();
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
    public function getCategoryIdWithUpdate($item)
    {
        if (!isset($item['id']))
        {
            $cat = Category::create($item);
        } else {
            $currentCat = Category::find($item['id']);
            $currentCat->update($item);
            $cat = $currentCat->fresh();
        }
        return $cat->id;
    }
    private function getCategoryId($item)
    {
        return !isset($item['id']) ? Category::create($item)->id : Category::find($item['id'])->id;
    }
}
