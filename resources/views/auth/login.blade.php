@extends('layouts.master')

@section('title', 'Login')

@section('content')

<form method="POST" action="/login">

    @csrf

    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input name = "email" type="text" class="form-control" id="exampleInputEmail1">
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

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
