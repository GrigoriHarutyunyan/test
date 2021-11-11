<form action="{{route('admin.store')}}" method="POST">
    @csrf

    <input type="hidden" value="{{$user->id}}" name="id">

    <label for="">Role for user {{$user->name}}</label>
    <select id="roles" name="name">
        <option value="admin">Admin</option>
        <option value="coach">Coach</option>
        <option value="player">Player</option>
    </select>
    <input type="submit" value="Submit">
</form>
<form action="{{route('admin.destroy', ['id'=> $user->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <button>Delete</button>
</form>
