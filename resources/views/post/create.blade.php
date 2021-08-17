<!DOCTYPE html>
<html>
<head>
    <title>Create new Post </title>
</head>
<hr>
<body>

<form action="#" method="post">

    <select name="channel_id" id="channel_id">

        @foreach($channels as $channel)
            <option value="{{$channel->id}}">{{$channel->name}}</option>
        @endforeach

    </select>

</form>




</body>
</html>
