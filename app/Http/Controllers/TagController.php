<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

//php artisan make:controller TagController

class TagController extends Controller
{
    public function index(Tag $tag = null)
    {
        $posts = $tag->posts;

        return view('posts.index', compact('posts'));
    }
}
