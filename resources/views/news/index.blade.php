@extends('layouts.master')

@section('title', 'News')

@section('content')

<h1>NEWS:</h1>
<br>
<br>

<dl>
@foreach ($news as $new)
    <dt><a href="{{route('single-news', ['id' => $new->id ])}}">{{$new->title}}</a></dt>
    <dd>
        {{$new->content}}
        <br>
        {{$new->user->name}}
        <br>
        {{$new->user->id}}
    </dd>
@endforeach
</dl>

{{ $news->onEachSide(10)->links() }}

@endsection
