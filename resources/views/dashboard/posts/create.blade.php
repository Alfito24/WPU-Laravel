@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Posts</h1>
</div>
<form method="POST" action="/dashboard/posts">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus>
      @error('title')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly>
        @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
    <div class="mb-3">
        <label for="category" class="form-label">Slug</label>
        <select class="form-select" name="category_id">
            @foreach ($categories as $category )
            @if (old('category_id') == $category -> id)
            <option value="{{ $category -> id }}" selected>{{ $category -> name }}</option>
            @else
            <option value="{{ $category -> id }}">{{ $category -> name }}</option>
            @endif
            @endforeach
          </select>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label> <br>
        <textarea value="{{ old('body') }}" class="@error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10"></textarea>
        @error('body')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        {{-- <input id="body" type="hidden" name="content"> --}}
        {{-- <trix-editor input="body"></trix-editor> --}}
    </div>
    <button type="submit" class="btn btn-primary">Add Post</button>
  </form>
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function () {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
    })
  </script>
@endsection
