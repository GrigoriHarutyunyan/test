@include('index')
<h2>{{$player->name}}</h2>
<table>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Club</th>
            <th>Country</th>
            <th>Age</th>
            @if(auth()->user()->hasRole('admin'))
                <th>Update</th>
                <th>Delete</th>
            @endif
            @if(auth()->user()->hasRole('coach'))
                <th>Update</th>
            @endif
        </tr>

        <tr>
            <td>{{$player->firstName}}</td>
            <td>{{$player->lastName}}</td>
            <td><a href="{{route('club.show', ['club'=>$player->club->id])}}">{{$player->club->name}}</a></td>
            <td>{{$player->country}}</td>
            <td>{{$player->age}}</td>
            @if(auth()->user()->hasRole('admin'))
                <td><a href="{{route('player.edit', ['player'=>$player->id])}}">Update</a></td>
                <td>
                    <form action="{{route('player.destroy', ['player'=> $player->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            @endif
            @if(auth()->user()->hasRole('coach'))
                <td><a href="{{route('player.edit', ['player'=>$player->id])}}">Update</a></td>
            @endif
        </tr>
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

