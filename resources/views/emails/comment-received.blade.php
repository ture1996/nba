@extends('layouts.master')

@section('title', 'MessageReceived' )

@section('content')
    New comment received by {{auth()->user()->name}}
@endsection
