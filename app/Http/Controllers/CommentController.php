<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {

        //maneras de validar
        /*$this->validate(request(), [
            'body' => 'required|min:2'
        ]);*/

        //version 5.5
        //creando rule
        //php artisan make:rule toUpperCase

        $postvalidate = request()->validate([
            'body' => ['required','min:2', new \App\Rules\toUpperCase]
        ]); //retorna un array con las claves y valor cuando pasaron la validacion, o un objeto si es uno

        //return [$postvalidate];

        $post->addComment($postvalidate["body"], auth()->id());
        //$post->addComment(request('body'), auth()->id());

        /*
        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id
        ]);
         */

        return back();
    }
}
