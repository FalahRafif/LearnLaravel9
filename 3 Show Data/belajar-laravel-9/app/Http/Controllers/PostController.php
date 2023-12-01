<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; # menambah model 

class PostController extends Controller
{
    #menambahkan method baru
    public function index()
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //render view with posts data
        return view('posts.index', compact('posts'));
    }
}
