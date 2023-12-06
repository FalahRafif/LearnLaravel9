<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; # menambah model 
use Symfony\Component\VarDumper\VarDumper;

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

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storePubliclyAs('public/posts', $image->hashName()); #fix storage link

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
