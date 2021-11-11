<div>
    <form action="{{route('coach.update', ['coach'=> $coach->id])}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name" >Name</label>
        <input type="text" id="name" name="firstName" value="{{$coach->firstName}}" placeholder="Club name..">

        <label for="name" >Surname</label>
        <input type="text" id="name" name="lastName" value="{{$coach->lastName}}" placeholder="Club name..">

        <label for="country">Country</label>
        <input type="text" id="country" name="country"  value="{{$coach->country}}" placeholder="Country..">

        <label for="age">Age</label>
        <input type="number" id="age" name="age" value="{{$coach->age}}" placeholder="Budget..">

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
