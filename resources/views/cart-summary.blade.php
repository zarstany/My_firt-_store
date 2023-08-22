<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu carrito de compras</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2a2837; /* Color de fondo oscuro */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #b39ddb; /* Color de título morado claro */
            margin: 20px 0;
        }

        p {
            text-align: center;
            color: #fff; /* Color de texto en blanco */
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            border: 1px solid #5c5a6f; /* Borde morado oscuro */
            border-radius: 8px;
            background-color: #3b3949; /* Fondo del formulario */
        }

        th, td {
            padding: 10px;
            border: 1px solid #5c5a6f; /* Borde morado oscuro */
            color: #fff; /* Color de texto en blanco */
        }

        th {
            background-color: #2a2837; /* Color de fondo oscuro */
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #673ab7; /* Color de botón morado */
            color:  /* Color de texto en blanco */
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
            margin-top: 10px;
            color: #9575cd; /* Color de enlace morado claro */
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a las ruinas de bangladesh</h1>

    <h1>Hola {{ auth()->user()->name }}</h1>
    <h1> ¡Aqui estan tus productos!</h1>
    <form action="{{ url('checkout') }}" method="GET">
        <button type="submit">Ir a pagar</button>
    </form>
   

    <table>
        <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Imagen</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Sub total</th>
        </tr>

        @forelse($carts as $index => $cart)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $cart->product->name }}</td>
            <td>
                <img src="{{ $cart->product->image }}" width="50" alt="Imagen de producto"
                    style="border: 1px solid #ddd;border-radius:5px;">
            </td>
            <td>{{ $cart->quantity }}</td>
            <td>{{ number_format($cart->product->price, 0, ',', '.') }}</td>
            <td>{{ number_format($cart->quantity * $cart->product->price, 0, ',', '.') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No hay productos en el carrito</td>
        </tr>
        @endforelse

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <th>Cantidad Total</th>
            <th></th>
            <th>Valor total</th>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $quantityTotal }}</td>
            <td></td>
            <td>{{ number_format($amountTotal, 0, ',', '.') }}</td>

        </tr>
    </table>

    <div>
        <a href="{{ url('/home') }}">Volver al catálogo</a>
    </div>
</body>
</html>
