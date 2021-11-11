@include('index')
<h2>Coaches</h2>
<h3><a href="{{route('index')}}">Home</a></h3>
<ul class="accordion-menu">
    @foreach($coaches as $coach)
    <li><a href="{{route('coach.show', ['coach'=> $coach->id ])}}">{{$coach->firstName}} {{$coach->lastName}}</a></li>
    @endforeach
</ul>
@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coach'))
    <a href="{{route('coach.create')}}" class="add">Add Club</a>
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
