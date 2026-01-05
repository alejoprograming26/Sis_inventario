@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/lotes') }}">Lotes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de Lotes</li>
        </ol>
    </nav>
    <hr>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h1 class="card-title"><b>Filtrado de Datos</b></h1>

                </div>
                <div class="card-body" style="display: block;">
                    <form action="{{ url('admin/lotes') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_desde">Desde:</label>
                                    <input type="date" id="fecha_desde" name="fecha_desde" class="form-control"
                                        placeholder="Fecha Desde">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_hasta">Hasta:</label>
                                    <input type="date" id="fecha_hasta" name="fecha_hasta" class="form-control"
                                        placeholder="Fecha Hasta">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" style="margin-top: 32px"><i
                                            class="fas fa-filter"></i>
                                        Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h1 class="card-title"><b>Lotes Registrados</b></h1>

                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Nr</th>
                                <th>Codigo Lote</th>
                                <th>Producto</th>
                                <th>Proveedor</th>
                                <th>Fecha Entrada</th>
                                <th>Fecha Vencimiento</th>
                                <th>Dias para Vencer</th>
                                <th>Cantidad Actual</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lotes as $lote)
                                <tr class="text-center {{ $lote->is_expired ? 'table-danger' : '' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lote->codigo_lote }}</td>
                                    <td>{{ $lote->producto->nombre }}</td>
                                    <td>{{ $lote->proveedor->nombre }}</td>
                                    <td>{{ $lote->fecha_entrada }}</td>
                                    <td>{{ $lote->fecha_vencimiento }}</td>
                                    <td>{{ $lote->days_to_expire }} Dias</td>
                                    <td>{{ $lote->cantidad_actual }}</td>
                                    <td>
                                        @if ($lote->is_expired)
                                            <span class="badge badge-danger">Vencido</span>
                                        @elseif ($lote->days_to_expire <= 15)
                                            <span class="badge badge-warning">Por Caducar</span>
                                        @else
                                            <span class="badge badge-success">Vigente</span>
                                        @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            /* Centrar los botones */
            gap: 15px;
            /* Espaciado entre botones */
            margin-bottom: 15px;
            /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #example1_wrapper .btn {
            color: #fff;
            /* Color del texto en blanco */
            border-radius: 4px;
            /* Bordes redondeados */
            padding: 5px 15px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-default {
            background-color: #6c7176;
            color: #212529;
            border: none;
        }
    </style>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Lotes",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Lotes",
                    "infoFiltered": "(Filtrado de _MAX_ total Lotes",
                    "lengthMenu": "Mostrar _MENU_ Lotes",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copy',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csv',
                        className: 'btn btn-info'
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning'
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });

        function eliminarFormacion(id) {
            Swal.fire({
                title: '¿Desea eliminar este registro?',
                text: '',
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: '#a5161d',
                denyButtonColor: '#270a0a',
                denyButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('miFormulario' + id).submit();
                }
            });
        }
    </script>

@stop
