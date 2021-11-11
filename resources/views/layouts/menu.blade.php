<ul class="menu">
    <li><a href="{{route('club.index')}}">Clubs</a></li>
    <li><a href="{{route('player.index')}}">Players</a></li>
    <li><a href="{{route('coach.index')}}">Coaches</a></li>
    @if(auth()->user() && auth()->user()->hasRole('admin'))
        <li><a href="{{route('admin.index')}}">Dashboard</a></li>
    @endif
</ul>

