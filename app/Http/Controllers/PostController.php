<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        //$posts = Post::all();
        //latest(column = 'created_at') = orderBy(column, 'desc')
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        //$post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //validar formulario
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

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
        /*Post::create([
            "title"     => request('title'),
            "body"      => request('body'),
            "user_id"   => auth()->id()     //auth()->user->id
        ]);*/

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        //Metodo 3, requiere $fillable
        //Post::create(request()->all());
        
        

        //redirigir a la pagina de inicio
        return redirect('../public/posts');
    }
}
