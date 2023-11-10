<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Filterable;
    protected $fillable = ['name', 'count_of_posts', 'description', 'category_id'];
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
