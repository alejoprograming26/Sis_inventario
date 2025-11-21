<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de Compra {{ $compra->id }}</title>
</head>

<body>
    <h1>Orden de Compra {{ $compra->id }}</h1>
    <p>Estimado/a Proveedor: {{ $proveedor->nombre }}</p>
    <p>Adjutamos los Detalles de la Orden de Compra-"Fecha": {{ $compra->fecha }}</p>
    <table style="width: 100%;border-collapse:collapse;"">
        <thead>
            <tr style="text-align:center;">
                <th>Nr</th>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles as $detalle)
                <tr style="text-align:center;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Gracias por su colaboración. En breve nos pondremos en contacto con usted</p>
</body>

</html>
