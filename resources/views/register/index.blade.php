@extends('layouts.main')
@section('container')
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .form-registration {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-registration .checkbox {
  font-weight: 400;
}

.form-registration .form-floating:focus-within {
  z-index: 2;
}

.form-registration input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-registration input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.form-floating{
    margin-bottom: 15px
}

    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

<main class="form-registration mb-3">
  <form class="/registration" method="POST">
    @csrf
    <img class="mb-4 rounded" src="img/logo.png" alt="" width="150px">
    <h1 class="h3 mb-3 fw-normal">Please Register First</h1>
    <div class="form-floating">
        <input value="{{ old('name') }}" type="text" name="name" class="form-control @error('name')
        is-invalid
        @enderror" id="name" placeholder="name@example.com">
        <label for="name">Name</label>
        @error('name')
        <div class="invalid-feedback">
           {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-floating">
        <input value="{{ old('username') }}" type="text" name="username" class="form-control @error('username')
        is-invalid
        @enderror" id="username" placeholder="name@example.com">
        <label for="username">Username</label>
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

    <div class="form-floating">
      <input value="{{ old('email') }}" type="email" name="email" class="form-control @error('email')
      is-invalid
      @enderror" id="email" placeholder="name@example.com">
      <label for="email">Email address</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control @error('password')
      is-invalid
      @enderror" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
  </form>
  <small >Already have an account? <a class="mt-3" href="/login">Login</a></small>
</main>



  </body>
</html>
@endsection
