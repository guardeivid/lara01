<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show($id)
    {
        return view('posts.show'/*, compact('post')*/);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //dd(request()->all());
        //request()->all()
        //request('title')
        //request(['title', 'body'])

        //crear un nuevo post usando el request
        //Metodo 1
        /*$post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();*/

        //Metodo 2, requiere $fillable
        Post::create([
            "title" => request('title'),
            "body"  => request('body')
        ]);

        //Metodo 3, requiere $fillable
        //Post::create(request()->all());
        
        

        //redirigir a la pagina de inicio
        return redirect('../public/posts');
    }
}
