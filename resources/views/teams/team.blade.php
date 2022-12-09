@extends('layouts.master')

@section('title', $team->name)

@section('content')

<p>{{$team->name}}</p>
<p>{{$team->email}}</p>
<p>{{$team->address}}</p>
<p>{{$team->city}}</p>
<br>
<p>Players:</p>
<br>
<ul>
    @foreach ( $team->players as $player )
        <li><a href="{{route('single-player', ['id' => $player->id])}}">{{ $player->first_name .' '. $player->last_name }}</a></li>
    @endforeach
</ul>

<form method="POST" action="/teams/{{ $team->id }}/comment">

    @csrf

    <div class="form-group">
      <label for="exampleInputEmail1">Type comment</label>
      <input name = "content" type="text" class="form-control" id="exampleInputEmail1">
    </div>

    @error('content')
        @include('partials.error')
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
<br>
<br>
<br>
<p>Comments:</p>
<ul>
    @foreach ( $team->comments as $comment )
        <li>{{ $comment->content }}</li>
    @endforeach
</ul>
@endsection
