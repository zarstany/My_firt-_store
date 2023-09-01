<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2a2837;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('https://img.freepik.com/fotos-premium/cementerio-tumbas-niebla-arboles-morados-hojas-moradas-suelo_839169-21757.jpg?w=2000');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        form {
            background-color: rgba(59, 57, 73, 0.8);
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.4);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            margin: 0 auto; /* Centra el formulario horizontalmente */
        }

        h3 {
            text-align: center;
            color: #b39ddb;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #fff;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #5c5a6f;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #4d4b5e;
            color: #fff;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #673ab7;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #512da8;
        }

        a {
            display: block;
            text-align: center;
            color: #7e57c2;
            text-decoration: none;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div id="login-form">
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
            <a href="#" id="toggle-form">Ven a registrarte</a>
        </form>
    </div>

    <div id="register-form" style="display: none;">
        <form action="{{ url('register') }}" method="POST">
            @csrf
            <h3>Crear tu cuenta</h3>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" placeholder="" value="{{ old('name') }}">
            <br><br>
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" id="email" placeholder="" value="{{ old('email') }}">
            <br><br>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
            <br><br>
            @if (session()->has('message'))
                <strong>{{ session()->get('message') }}</strong>
                <br><br>
            @endif
            <button type="submit">Crear mi cuenta</button>
            <br>
            ¿Ya tienes una cuenta?
            <a href="{{ url('login') }}">
                Iniciar sesión
           </a>
            
        
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loginForm = document.getElementById("login-form");
            const registerForm = document.getElementById("register-form");
            const toggleButton = document.getElementById("toggle-form");
    
            toggleButton.addEventListener("click", function() {
                if (loginForm.style.display === "none") {
                    loginForm.style.display = "block";
                    registerForm.style.display = "none";
                    toggleButton.textContent = "Ven a registrarte";
                } else {
                    loginForm.style.display = "none";
                    registerForm.style.display = "block";
                    toggleButton.textContent = "Iniciar sesión";
                }
            });
        });
    </script>
    
    
</body>

</html>
        