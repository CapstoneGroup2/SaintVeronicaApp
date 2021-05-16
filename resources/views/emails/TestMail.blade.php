<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saint Veronica Learning Center</title>
</head>
<body>
    <div style="margin: 20px 100px;box-shadow: 0 5px 8px 0 rgb(0 0 0 / 20%), 0 9px 26px 0 rgb(0 0 0 / 19%); padding: 50px;">
        <center><img width="110" height="100" src="{{ URL::to('/images/logo.jpg') }}"></center>
        <h3>{{ $details['title'] }}</h3>
        <br>
        <p>{{ $details['body'] }}</p>
        <br>
        <p>Thank you!</p>
    </div>
</body>
</html>