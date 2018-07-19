<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts)
    {
        //inyectado desde el repositorio
        //$posts = $posts->all();

        //$posts = Post::all();
        
        //ordenar de la ultima a la primera
        //latest(column = 'created_at') = orderBy(column, 'desc')
        $posts = Post::latest()->get();
        
        //FILTRAR con
        //scopeFilter en modelo
        /*if (request(['month', 'year'])) {
            $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();
        } else {
            $posts = Post::latest()->get();
        }*/

        //desde el controlador uniendo la consulta
        /*$posts = Post::latest();
        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }
        $posts = $posts->get();*/

        //usando una consulta raw, 
        /*$archives = Post::selectRaw("date_part('year', created_at) as year, trim(to_char(created_at, 'Month')) as month, count(*)")
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();*/

        //se puede llevar al modelo
        //$archives = Post::archives();
        
        //o usando View::composer desde AppServiceProvider
        //y no es necesario incluir en la vista la variable $archives, ya que la incluye desde AppServiceProvider

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
        
        session()->flash('messagge', 'Post creado con exito');

        //redirigir a la pagina de inicio
        return redirect('../public/posts');
    }
}
