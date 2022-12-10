@extends('layouts.master')

@section('title', $news->title)

@section('content')

<p>{{$news->title}}</p>

<p>{{$news->content}}</p>

<p>{{$news->user->name}}</p>

<p>{{$news->user->id}}</p>

@endsection
