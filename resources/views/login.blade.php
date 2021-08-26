<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Server A</title>
</head>
<body>
    <form method="POST" action="{{route('loginApi')}}">
        @csrf
        <label>
            <input name="email" type="email" placeholder="Email">
        </label>
        <label>
            <input name="password" type="password" placeholder="Password">
        </label>
        <button type="submit">Login</button>
    </form>
</body>
</html>