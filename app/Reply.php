<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $with = ['user'];
    protected $fillable = [
        'user_id','description','post_id','comment_id'
    ];
    public function user(){

        return $this->belongsTo(user::class);
    }
    public function comment(){

        return $this->belongsTo(Comment::class);
    }
}
