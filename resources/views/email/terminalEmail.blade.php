<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test site</title>
    </head>

    <body>
        @foreach($details as $detail)
        <h3>Your Credentials for Terminal Plan {{$i++}}</h3>
        <p>Username: {{$detail['username']}}</p>
        <p>Password: {{$detail['password']}}</p>
        @endforeach
        <p>Thankyou!!</p>
    </body>
</html>
