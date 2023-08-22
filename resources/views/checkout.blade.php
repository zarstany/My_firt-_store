<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2a2837;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #b39ddb;
            margin: 20px 0;
        }

        p {
            text-align: center;
            color: #fff;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            border: 1px solid #363638;
            border-radius: 8px;
            background-color: #3b3949; /* Cambio del color de fondo a gris */
        }

        th, td {
            padding: 10px;
            border: 1px solid #5c5a6f; /* Borde morado oscuro */
            color: #fff;
        }

        th {
            background-color: #2a2837;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
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
            margin-top: 10px;
            color: #9575cd;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <h1>Realizando el pago</h1>

    <h4>
        <small>
            <a href="{{ url('/cart-summary') }}">Volver al carrito</a>
        </small>
    </h4>

    <table>
        <tr>
            <th>Sub total</th>
            <th>Domicilio</th>
            <th>IVA</th>
        </tr>

        <tr>
            <td>{{ number_format($subTotal, 0, ',', '.') }}</td>
            <td>{{ number_format($deliveryAmount, 0, ',', '.') }}</td>
            <td>{{ number_format($iva, 0, ',', '.') }}</td>
        </tr>

        <tr>
            <th colspan="3">Total de la compra</th>
        </tr>
        <tr>
            <td colspan="3">{{ format_cop($total) }}</td>
        </tr>
    </table>

    <form action="{{ url('checkout') }}" method="POST">
        @csrf
        <button type="submit">Realizar Compra</button>
    </form>
</body>
</html>
