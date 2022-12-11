@extends('layouts.master')

@section('title', $team->name)

@section('content')

<h1>News for {{$team->name}} team:</h1>
<br>
<ul>
@foreach ($news as $new)

<li>{{$new->content}}</li>

@endforeach
</ul>

{{ $news->onEachSide(5)->links() }}

@endsection
