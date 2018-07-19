<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Carbon\Carbon;

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

    public function tags()
    {
        //php artisan tinker
        //$post = \App\Post::first()
        //$post->tags                   //colleccion de etiquetas
        //$post->tags->pluck('name')    //devuelve array de los nombres de las etiquetas

        return $this->belongsToMany(Tag::class);
        //si se necesita la relacion para todos, se puede incluir con la funcion
        //$post = \App\Post::all()
        //$post = \App\Post::with('tags')->get()
        

        //Agregar relacion
        //$post = \App\Post::find(1)
        //$tag = \App\Tag::where('name', 'personal')->first()
        //$post->tags()->attach($tag)   //o $tag->id
        
        //quitar relacion
        //$post->tags()->detach($tag)
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

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }


    //View Composer
    public static function archives()
    {
        return static::selectRaw("date_part('year', created_at) as year, trim(to_char(created_at, 'Month')) as month, count(*)")
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
