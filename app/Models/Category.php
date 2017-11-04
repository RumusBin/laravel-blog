<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'category_posts')->orderBy('created_at', 'desc')->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
