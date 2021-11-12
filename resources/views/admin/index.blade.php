
@extends('layouts.app')

@section('content')
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
@endsection
    <style>
        li{
            font-size:20px;
        }
    </style>
