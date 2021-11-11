@include('index')
<h2>{{$coach->firstName}}</h2>
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
            <td>{{$coach->firstName}}</td>
            <td>{{$coach->lastName}}</td>
            <td><a href="{{route('club.show', ['club'=>$coach->club->id])}}">{{$coach->club->name}}</a></td>
            <td>{{$coach->country}}</td>
            <td>{{$coach->age}}</td>
            @if(auth()->user()->hasRole('admin'))
                <td><a href="{{route('coach.edit', ['coach'=>$coach->id])}}">Update</a></td>
                <td>
                    <form action="{{route('coach.destroy', ['coach'=> $coach->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            @endif
            @if(auth()->user()->hasRole('coach'))
                <td><a href="{{route('coach.edit', ['coach'=>$coach->id])}}">Update</a></td>
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

