<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
	protected $fillable = ['user_id', 'post_id', 'body'];

    // $comment->post    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // $comment->user
    // $comment->post->user
    // $comment->user->name etc
    public function user()	
    {
        return $this->belongsTo(User::class);
    }

}
