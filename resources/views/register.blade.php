<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrate en nuestra app </title>
</head>

<body>

    <H1>Registrate</H1>

    <div>
        <form action="{{ url('register') }}" method="POST">
            @csrf
            <label>Nombre</label>
            <input type="text" name="name" id="name">
            <label>Email</label>
            <input type="text" name="email" id="email">
            <label>Contraseña</label>
            <input type="password" name="password" id="password">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>