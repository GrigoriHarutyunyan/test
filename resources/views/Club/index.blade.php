@include('index')
<h2>Football Clubs</h2>
<h3><a href="{{route('index')}}">Home</a></h3>
<ul class="accordion-menu">
    @foreach($clubs as $club)
    <li><a href="{{route('club.show', ['club'=> $club->id ])}}">{{$club->name}}</a></li>
    @endforeach
</ul>
@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coach'))
    <a href="{{route('club.create')}}" class="add">Add Club</a>
@endif
@yield('menu')

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
