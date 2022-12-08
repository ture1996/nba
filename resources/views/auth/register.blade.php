@extends('layouts.master')

@section('title', 'Register')

@section('content')

<form method="POST" action="/register">

    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input name = "name" type="text" class="form-control" id="exampleInputEmail1">
    </div>

    @error('name')
        @include('partials.error')
    @enderror

    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input name = "email" type="email" class="form-control" id="exampleInputEmail1">
    </div>

    @error('email')
        @include('partials.error')
    @enderror

    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>

    @error('password')
        @include('partials.error')
    @enderror

    <div class="form-group">
        <label for="exampleInputPassword1">Password confirmation</label>
        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
    </div>

    @error('password_confirmation')
        @include('partials.error')
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
