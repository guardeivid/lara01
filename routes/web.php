<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use App\Task;

//use Illuminate\Support\Facades\View;

//ELOQUENT
//php artisan tinker

//\App\Task::all()

//\App\Task::where('id', '>', 2)->get()

//\App\Task::pluck('body')  //collection de resultados con esa columna {all:['', ...]}
//\App\Task::pluck('body')->first() //texto

//$task = \App\Task::find(1)
//$task = \App\Task::first()
//$task->isComplete()   //false

//$task = new App\Task
//$task->body = "Nueva tarea"
//$task->save()

//App\Task::first()->completed

//$task = \App\Task::where('completed', 1)->get()
//$task = \App\Task::where('completed', 0)->get()

//$task = \App\Task::incomplete()

//Si se borran clases hay que ejecutar
//composer dump-autoload

/*Route::get('tasks/{id}', function ($id) {
    //eloquent
    return Task::incomplete()->where('id', '>', 2)->get();
    //return Task::incomplete();
    
    
    $task = Task::find($id);
    //$task = \App\Task::find($id);
    return $task->isComplete();
    
    //dd($id);
    //query builder
    $task = DB::table('tasks')->find($id);
    //dd($task);
    return view('tasks.show', compact('task'));
});*/

/*Route::get('tasks', function () {
    $tasks = Task::all();
    //$tasks = DB::table('tasks')->latest()->get();
    return view('tasks.index', compact('tasks'));
});*/


//php artisan make:controller TaskController
Route::get('tasks', 'TaskController@index');
Route::get('tasks/{task}', 'TaskController@show');

/*
Route::get('/c', function () {
    //Query builder
    $tasks = DB::table('tasks')->latest()->get();
    //$tasks = DB::table('tasks')->orderBy('created_at', 'DESC')->get();

    //$tasks = DB::table('tasks')->get();
    //return $tasks;

    return view('index4', compact('tasks'));
});

Route::get('/b', function () {

    $tasks = [
        "Ir a la tienda",
        "Terminar de grabar",
        "Limpiar la casa",
    ];

    return view('index3', compact('tasks'));
});

Route::get('/a', function () {

    $name = "World";
    $age = 32;

    return view('index2', compact('name', 'age'));

    return view('index2', ["name" => $name]);

    return view('index2')->with("name", "World")->with("age", "23");

    return view('index2', [
        "name" => "World",
        "age" => "23"
    ]);
});

Route::get('/', function () {
    return view('index');
    
    return View::make('welcome');
});*/


//php artisan make:model Post -mc
Route::get('posts', 'PostController@index')->name('home');
Route::get('posts/create', 'PostController@create');
Route::post('posts', 'PostController@store');
Route::get('posts/{post}', 'PostController@show');

Route::post('posts/{post}/comments', 'CommentController@store');

Route::get('posts/tags/{tag}', 'TagController@index');

//posts

//GET       /posts                index()
//GET       /posts/create         create()
//POST      /posts                store()
//GET       /posts/{id}/edit      edit()
//GET       /posts/{id}           show()
//PATCH     /posts/{id}           update()
//DELETE    /posts/{id}           destroy()


//para usar autorizacion, de una instalacion limpia
//php artisan auth

//web.php
//Auth::routes();

//Controller en constructor con
//$this->middleware('auth');

//crea vistas con login y register

Route::get('register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('login', 'SessionController@create');
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');

//php artisan make:controller RegistrationController
//php artisan make:controller SessionController
