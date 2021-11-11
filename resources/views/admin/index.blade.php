
@include('layouts.app')
@yield('navbar')
@section('menu')
    <h1>All Users</h1>
    <ul>

    @foreach($users as $user)
            <li>
                <a href="{{route('admin.roles', ['id'=>$user->id])}}">
                    {{$user->name}}
                    @foreach($user->roles as $role)
                        -> {{$role->name}}
                    @endforeach
                </a>
            </li>
        @endforeach
    </ul>

    <style>
        li{
            font-size:20px;
        }
    </style>
