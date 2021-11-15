@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="row my-5">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>
            <a href="/dashboard/posts" class="btn btn-success mb-4">Back to my posts</a>
            <a href="/dashboard/posts/{{ $post -> slug }}/edit" class="btn btn-warning mb-4">Edit</a>
            <form action="/dashboard/posts/{{ $post -> slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            <img src="https://source.unsplash.com/1200x400?{{ $post -> category -> name }}" alt="" class="img-fluid">
            <article class="my-4">
                {!! $post->body !!}
            </article>
            <br> <br>
           <a class="btn btn-primary" href="/dashboard" style="color: white;">Back to post</a>
        </div>
    </div>
</div>
@endsection
