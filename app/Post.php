<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $with = ['topic','user','comment'];
    //
    protected $fillable = [
        'user_id','description','topic_id'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }
    public function topic(){

        return $this->belongsTo(Topic::class);
    }
    public function comment(){

        return $this->hasMany(Comment::class);
    }
    public function relatedData(){
        $Comment=$this->comment()->get();
        $Comment->each->relatedReplies();
        $this->comment()->delete();
    }
}
