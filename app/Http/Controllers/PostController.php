<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            "title" => "All Posts",
            "active"=> 'posts' ,
            "posts" => PostModel::latest() -> filter(request(['search', 'category', 'author'])) -> paginate(7) -> withQueryString()
        ]);
    }
    public function show(PostModel $post){
        return view('post', [
            "title" => "Single Post",
            "active"=> 'posts' ,
            "post" => $post
        ]);
    }
}
