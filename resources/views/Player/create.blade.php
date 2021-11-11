<h1>Create Player</h1>

<div>
    <form action="{{route('player.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="firstName" placeholder="Name..">

        <label for="surname">Surname</label>
        <input type="text" id="surname" name="lastName" placeholder="Surname..">

        <label for="country">Country</label>
        <input type="text" id="country" name="country" placeholder="Country..">

        <label for="age">Age</label>
        <input type="number" id="age" name="age" placeholder="Age..">

        <label for="club">Club</label>
        <select id="club" name="club_id">
            @foreach($clubs as $club)
                <option value="{{$club->id}}">{{$club->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Submit">
    </form>
</div>

<style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>
