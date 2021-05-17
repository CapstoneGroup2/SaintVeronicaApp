<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saint Veronica Learning Center</title>
</head>
<body>
    <div>
        <center><img alt="Logo" src="{{ URL::to('/images/logo_mail.jpg') }}"></center>
        <br>
        <h3>{{ $details['title'] }}</h3>
        <br>
        <p>{{ $details['body'] }}</p>
        <br>
        <p>Thank you!</p>
    </div>
</body>
</html>