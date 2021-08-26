<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Server A</title>
</head>
<body>
    <form method="POST" action="{{route('register')}}">
        @csrf
        <label>
            <input name="name" type="name" placeholder="Name">
        </label>
        <label>
            <input name="email" type="email" placeholder="Email">
        </label>
        <label>
            <input name="password" type="password" placeholder="Password">
        </label>
        <button type="submit">Register</button>
    </form>
</body>
</html>