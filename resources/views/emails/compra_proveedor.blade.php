<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de Compra #{{ $compra->id }}</title>
    <style>
        /* Estilos Generales */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px 20px;
            color: #333;
        }

        /* Contenedor Principal (Efecto Hoja de Papel) */
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Cabecera */
        .header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #007bff;
            font-size: 28px;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header span {
            display: block;
            margin-top: 5px;
            color: #888;
            font-size: 14px;
        }

        /* Sección de Información */
        .info-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            border-left: 5px solid #007bff;
            margin-bottom: 30px;
        }

        .info-section p {
            margin: 5px 0;
            font-size: 15px;
        }

        .info-section strong {
            color: #555;
            min-width: 80px;
            display: inline-block;
        }

        /* Tabla de Productos */
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .product-table th {
            background-color: #007bff;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 14px;
            text-transform: uppercase;
        }

        .product-table td {
            border-bottom: 1px solid #eee;
            padding: 12px;
            font-size: 14px;
            color: #555;
        }

        .product-table tbody tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        /* Pie de página */
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 13px;
            color: #999;
        }

        .btn-action {
            display: block;
            width: fit-content;
            margin: 20px auto 0;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Orden de Compra</h1>
            <span>Referencia #{{ $compra->id }}</span>
        </div>

        <div class="info-section">
            <p><strong>Proveedor:</strong> {{ $proveedor->nombre }}</p>
            <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($compra->fecha)->format('d/m/Y') }}</p>
        </div>

        <p style="margin-bottom: 15px;">Estimado proveedor, adjuntamos los detalles del pedido solicitado:</p>

        <table class="product-table">
            <thead>
                <tr>
                    <th style="width: 10%; text-align: center;">#</th>
                    <th style="width: 70%;">Producto</th>
                    <th style="width: 20%; text-align: center;">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalles as $detalle)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td>{{ $detalle->producto->nombre }}</td>
                        <td style="text-align: center; font-weight: bold;">{{ $detalle->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Gracias por su colaboración. En breve nos pondremos en contacto con usted.</p>
            <p>&copy; {{ date('Y') }} Tu Empresa. Todos los derechos reservados.</p>
        </div>
    </div>

</body>

</html>
