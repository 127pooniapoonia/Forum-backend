<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
//    protected $with = ['posts'];
    protected $fillable = [
        'title', 'description'
    ];

    protected $appends=['post_count'];

    public function posts()
    {
        return $this->hasMany(Post::class);

    }

    public function getPostCountAttribute()
    {
        return $this->posts()->count();
    }
}
