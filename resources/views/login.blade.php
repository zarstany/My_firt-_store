<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2a2837; /* Color de fondo oscuro */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #3b3949; /* Fondo del formulario */
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.4);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
        }

        h3 {
            text-align: center;
            color: #b39ddb; /* Color de título morado claro */
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #fff; /* Color de etiquetas en blanco */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #5c5a6f; /* Borde morado oscuro */
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #4d4b5e; /* Fondo de input morado oscuro */
            color: #fff; /* Color de texto en blanco */
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #673ab7; /* Color de botón morado */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #512da8; /* Color de botón morado oscuro al pasar el mouse */
        }

        a {
            display: block;
            text-align: center;
            color: #9575cd; /* Color de enlace morado claro */
            text-decoration: none;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form action="{{ url('login') }}" method="POST">
        @csrf

        <h3>Iniciar Sesión</h3>

        <label for="email">Correo electrónico</label>
        <input type="text" name="email" id="email" value="{{ old('email') }}">
        <br><br>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Contraseña">
        <br><br>

        @if (session()->has('message'))
            <strong>{{ session()->get('message') }}</strong>
            <br><br>
        @endif

        <button type="submit">Iniciar Sesión</button>

        <br>
        ¿No tienes una cuenta?
        <a href="{{ url('register') }}">Ven a registrarte</a>
    </form>
</body>

</html>
