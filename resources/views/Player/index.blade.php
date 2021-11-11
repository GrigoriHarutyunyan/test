@extends('layouts.app')

@section('content')
<h2>Football Players</h2>

<ul class="accordion-menu">
    @foreach($players as $player)
    <li><a href="{{route('player.show', ['player'=> $player->id ])}}">{{$player->firstName}} {{$player->lastName}}</a></li>
    @endforeach
</ul>
@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coach'))
    <a href="{{route('player.create')}}" class="add">Add Club</a>
@endif
@endsection
<style>
    li{
        list-style-type: none;
        margin-bottom:10px;
    }
    a{
        text-decoration:none;
        color: #000;
    }

    .add{
        background-color:black;
        border: 1px solid black;
        color: #edf2f7;
        padding:10px;
        margin: 0 0 0 38px;
    }
</style>
