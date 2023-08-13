<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c2c2c; /* Fondo oscuro */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #3a3a3a; /* Formulario oscuro */
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
        }

        h3 {
            text-align: center;
            color: #dda0dd; /* Morado oscuro */
        }

        p {
            text-align: center;
            color: #9b7a9a; /* Tonos más oscuros de morado */
            font-size: 24px;
            font-weight: bold;
            margin-top: -5px;
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #fff; /* Texto blanco */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #555; /* Borde gris oscuro */
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4b0082; /* Morado oscuro */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3d0066; /* Morado aún más oscuro al pasar el ratón */
        }

        a {
            display: block;
            text-align: center;
            color: #dda0dd; /* Morado oscuro */
            text-decoration: none;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form action="{{ url('register') }}" method="POST">
        @csrf

        <p>Bienvenido a las Ruinas de Bangladesh</p>

        <h3>Crear tu cuenta</h3>

        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" placeholder="Pepito Pérez" value="{{ old('name') }}">
        <br><br>

        <label for="email">Correo electrónico</label>
        <input type="text" name="email" id="email" placeholder="pepito@perez.co" value="{{ old('email') }}">
        <br><br>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <br><br>

        @if (session()->has('message'))
        <strong>
            {{ session()->get('message') }}
        </strong>
        <br><br>
        @endif

        <button type="submit">Crear mi cuenta</button>

        <br>
        ¿Ya tienes una cuenta?
        <a href="{{ url('login') }}">
             iniciar sesión
        </a>

    </form>
</body>

</html>
