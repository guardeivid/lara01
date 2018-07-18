<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
        /*
        php artisan tinker
        $post = App\Post::find(1)
        $post->comments     //retorna una colleccion
        */
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => null
        ]);
    }
    

    public function addComment($body, $user_id)
    {
        
        $this->comments()->create([
            'body'    => $body,
            "user_id" => $user_id
        ]);
        //$this->comments()->create(compact('body'));

        /*Comment::create([
            'body'      => $body,
            'post_id'   => $this->id
        ]);*/
    }
}
