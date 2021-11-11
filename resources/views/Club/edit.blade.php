<div>
    <form action="{{route('club.update', ['club'=> $club->id])}}" method="POST">
        @csrf

        @method('PUT')
        <label for="name" >Club Name</label>
        <input type="text" id="name" name="name" value="{{$club->name}}" placeholder="Club name..">

        <label for="stadium">Stadium</label>
        <input type="text" id="stadium" name="stadium"  value="{{$club->stadium}}" placeholder="Stadium..">

        <label for="country">Country</label>
        <input type="text" id="country" name="country"  value="{{$club->country}}" placeholder="Country..">

        <label for="city">City</label>
        <input type="text" id="city" name="city"  value="{{$club->city}}" placeholder="City..">

        <label for="budget">Budget</label>
        <input type="number" id="budget" name="budget" value="{{$club->budget}}" placeholder="Budget..">

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
