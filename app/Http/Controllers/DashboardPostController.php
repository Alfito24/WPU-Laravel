<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
// use Dotenv\Util\Str;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => PostModel::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);
        $validatedData['user_id'] = auth() -> user() -> id;
        $validatedData['excerpt'] =Str::limit($request->body, 200);
        PostModel::create($validatedData);
        return redirect('dashboard/posts') -> with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function show(PostModel $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PostModel $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostModel $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];
        if($request -> slug != $post -> slug){
            $rules['slug'] = 'required|unique:posts';
        };
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth() -> user() -> id;
        $validatedData['excerpt'] =Str::limit($request->body, 200);
        PostModel::where('id', $post -> id)
                    -> update($validatedData);
        return redirect('dashboard/posts') -> with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostModel $post)
    {
        PostModel::destroy($post -> id);
        return redirect('dashboard/posts') -> with('success', 'Post has been deleted');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(PostModel::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
