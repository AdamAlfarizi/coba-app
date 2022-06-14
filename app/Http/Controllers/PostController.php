<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' by ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        

        return view('posts',[
            "title" => "Berita Desa" . $title ,
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate(5)->withQueryString(),
            "categories" => Category::all()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            "title"=>"single post",
            "post"=> $post
        ]);
    }
}
