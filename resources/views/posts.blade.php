@extends('layouts.main')
@section('container')
    <h1 class="text-center">{{ $title }}</h1>
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
    <form action="/posts" method="GET">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('user'))
        <input type="hidden" name="user" value="{{ request('user') }}">
    @endif
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
          </div>
    </form>
        </div>
    </div>
@if ($posts -> count())
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
    <div class="card-body text-center">
      <h3 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0] -> title }}</a></h3>
      <p>By <a class="text-decoration-none" href="/posts?user={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a> in <a  class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a></p>
      <p class="card-text">{{ $posts[0] -> excerpt }}</p>
      <p class="card-text"><small class="text-muted">Last updated {{ $posts[0] -> created_at->diffForHumans() }}</small></p>
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
    </div>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        @foreach ($posts->skip(1) as $post )
          <div class="col-md-4 mb-5">
            <div class="card">
                <div class="position-absolute bg-dark p-2 "><a class="text-decoration-none text-white" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p>By <a class="text-decoration-none" href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a></p>
                  <p class="card-text">{{ $post->excerpt }}.</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
  @else
     <p class="text-center fs-4">No Post Found</p>
  @endif
 <div class="justify-content-end d-flex">
    {{ $posts->links() }}
 </div>
@endsection
