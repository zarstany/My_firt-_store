<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis órdenes</title>
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

        h2 {
            text-align: center;
            color: #b39ddb; /* Color de título morado claro */
            margin: 20px 0;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #9575cd; /* Color de enlace morado claro */
            text-decoration: none;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            border: 1px solid #5c5a6f; /* Borde morado oscuro */
            border-radius: 8px;
            background-color: #3b3949; /* Fondo de la tabla */
        }

        th, td {
            padding: 10px;
            border: 1px solid #5c5a6f; /* Borde morado oscuro */
            color: #fff; /* Color de texto en blanco */
        }

        th {
            background-color: #2a2837; /* Color de fondo oscuro */
        }

        .order-status {
            padding: 5px;
            border-radius: 10px;
            color: white;
        }

        .order-status.pending {
            background-color: yellow;
        }

        .order-status.complete {
            background-color: #4CAF50;
        }

        .order-status.cancel {
            background-color: red;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>Estas son las órdenes que tienes</h2>

    <div class="back-link">
        <a href="{{ url('/home') }}">Regresar al catálogo</a>
    </div>

    <table>
        <tr>
            <th>#</th>
            <th>Total</th>
            <th># de productos</th>
            <th>Estado</th>
            <th>Creada el</th>
        </tr>
        @forelse($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->total }}</td>
            <td style="text-align: center;">
                @php
                    $totalProductsCount = 0;
                    foreach($order->orderproduct as $orderProduct) {
                        $totalProductsCount += $orderProduct->quantity;
                    }
                    echo $totalProductsCount;
                @endphp
            </td>
            <td>
                <span class="order-status {{ $order->status }}">{{ ucfirst($order->status) }}</span>
            </td>
            <td>
                {{ $order->created_at->diffForHumans() }}
                <br>
                <small>
                    {{ $order->created_at->toDayDateTimeString() }}
                </small>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                @php
                    $productsInOrder = [];
                @endphp
                @foreach($order->orderproduct as $orderProduct)
                    @if ($orderProduct->product)
                        @php
                            $productsInOrder[] = $orderProduct->product->name . " (Cantidad: " . $orderProduct->quantity . ")";
                        @endphp
                    @endif
                @endforeach
                @if (!empty($productsInOrder))
                    {{ implode('<br>', $productsInOrder) }}
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No has realizado ninguna orden.</td>
        </tr>
        @endforelse
    </table>
</body>

</html>
