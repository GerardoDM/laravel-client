<a href="/">Inicio</a>

@if(Cookie::get('name') !== null)
<a href="/dashboard">Dashboard</a>
@else
<a href="/login">Login</a>
@endif