@extends('layouts.main')
@section('container')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>{{ $post->title }}</h2>
                    <p>By <a class="text-decoration-none text-dark" href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a> in <a  class="text-decoration-none text-dark" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                    <img src="https://source.unsplash.com/1200x400?{{ $post -> category -> name }}" alt="" class="img-fluid">
                    <article class="my-4">
                        {!! $post->body !!}
                    </article>
                    <br> <br>
                   <a class="btn btn-primary" href="/blog" style="color: white;">Back to post</a>
                </div>
            </div>
        </div>
@endsection
