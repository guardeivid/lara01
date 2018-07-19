<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//php artisan make:model Tag -m

class Tag extends Model
{
    public function posts()
    {
        //php artisan tinker
        //$tags = \App\Tag::first()
        //$tags->posts                  //colleccion de etiquetas
        
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
    	//permite a las rutas obtener el registro por id y por la columna name
    	//posts/tags/1
    	//posts/tags/personal
    	return 'name';
    }
}
