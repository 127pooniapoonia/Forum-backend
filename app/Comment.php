<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $with = ['user','reply'];
    //
    protected $fillable = [
        'user_id','description','post_id'
    ];
    public function user(){

        return $this->belongsTo(user::class);
    }
    public function reply(){

        return $this->hasMany(Reply::class);
    }
    public function relatedReplies(){
        $this->reply()->delete();
    }
}
