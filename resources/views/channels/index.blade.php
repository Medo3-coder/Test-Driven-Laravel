<!DOCTYPE html>
<html>
<head> Channels </head>
<body>

@foreach($channels as $channel)
    <li> {{$channel->name}}</li>
@endforeach

</body>
</html>
