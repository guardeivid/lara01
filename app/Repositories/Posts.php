<?php

namespace App\Repositories;

use App\Post;

//capa de abstracion para el controlador (SOLID)

class Posts
{

    //retornar todos los posts
    //$posts = new App\Repositories\Posts
    //$posts->all()
    //se puede inyectar en el constructor o en cada funcion del controlador
    public function all()
    {
        return Post::all();
    }
}
