<!DOCTYPE html>
<html lang="en">

<head>
    <title>Iniciar sesion </title>
</head>

<body>

    <H1>Iniciar Sesion</H1>

    <div>
        <form action="{{ url('login/user') }}" method="POST">
            @csrf
            <label>Email</label>
            <input type="text" name="email" id="email">
            <label>Password</label>
            <input type="password" name="password" id="password">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>