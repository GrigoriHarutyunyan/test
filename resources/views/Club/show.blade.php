@include('index')
<h2>{{$club->name}}</h2>
<table>
        <tr>
            <th>Club</th>
            <th>Coach</th>
            <th>Stadium</th>
            <th>Country</th>
            <th>City</th>
            <th>Budget</th>
            @if(auth()->user()->hasRole('admin'))
                <th>Update</th>
                <th>Delete</th>
            @endif
            @if(auth()->user()->hasRole('coach'))
                <th>Update</th>
            @endif
        </tr>

        <tr>
            <td>{{$club->name}}</td>
            @if(!$club->coach)
                <td>--------</td>
            @else
            <td><a href="{{route('coach.show', ['coach'=>$club->coach->id])}}">{{$club->coach->firstName}}</a></td>
            @endif
            <td>{{$club->stadium}}</td>
            <td>{{$club->country}}</td>
            <td>{{$club->city}}</td>
            <td>{{$club->budget}}</td>
            @if(auth()->user()->hasRole('admin'))
                <td><a href="{{route('club.edit', ['club'=>$club->id])}}">Update</a></td>

                <td>
                    <form action="{{route('club.destroy', ['club'=> $club->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            @endif
            @if(auth()->user()->hasRole('coach'))
                <td><a href="{{route('club.edit', ['club'=>$club->id])}}">Update</a></td>
            @endif

        </tr>
</table>
<table style="margin-top:50px; width:200px">
    <tr>
        <th>Players</th>
    </tr>
@foreach($club->players as $player)

    <tr>
        @if(!$player)
            <td>-------</td>
        @else
        <td><a href="{{route('player.show', ['player'=>$player->id])}}">{{$player->firstName}} {{$player->lastName}}</a></td>
        @endif
    </tr>

@endforeach
</table>
@yield('menu')
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
