@include('layouts.app')
@yield('navbar')
@section('menu')
    <ul>
    <li><a href="{{route('club.index')}}">Clubs</a></li>
    <li><a href="{{route('player.index')}}">Players</a></li>
    <li><a href="{{route('coach.index')}}">Coaches</a></li>
        @if(auth()->user()->hasRole('admin'))
            <li><a href="{{route('admin.index')}}">Dashboard</a></li>
        @endif
</ul>

<style>
    li{
        font-size:20px;
    }
</style>
