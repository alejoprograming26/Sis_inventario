@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/productoss') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de Productos</li>
        </ol>
    </nav>
    <hr>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-orange">
                <div class="card-header">
                    <h1 class="card-title"><b>Productos Registrados</b></h1>
                    <div class="card-tools">
                        <a href="{{ url('admin/productos/create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus"></i> Crear</a>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Nr</th>
                                <th>Categoria</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Stock Minimo</th>
                                <th>Stock Maximo</th>
                                <th>Unidad Medida</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>{{ $producto->codigo }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>
                                        @if ($producto->imagen)
                                            <img src="{{ asset('storage/' . $producto->imagen) }}"
                                                alt="{{ $producto->nombre }}" width="100">
                                        @else
                                            <span class="badge badge-warning">Sin Imagen</span>
                                        @endif
                                    </td>
                                    <td>{{ $producto->precio_compra }}</td>
                                    <td>{{ $producto->precio_venta }}</td>
                                    <td>{{ $producto->stock_minimo }}</td>
                                    <td>{{ $producto->stock_maximo }}</td>
                                    <td>{{ $producto->unidad_medida }}</td>
                                    <td>
                                        @if ($producto->estado == '1')
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-danger">Inactivo</span>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ url('admin/productos/' . $producto->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="fas fa-eye"></i> Ver
                                            </a>
                                            <a href="{{ url('admin/productos/' . $producto->id . '/edit') }}"
                                                type="button" class="btn btn-success"><i class="fas fa-edit"></i>
                                                Editar</a>
                                            <form action="{{ url('/admin/productos/' . $producto->id) }}"
                                                id="miFormulario{{ $producto->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="event.preventDefault(); eliminarFormacion('{{ $producto->id }}');">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>

                                        <script>
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
                                    </td>
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                    "infoFiltered": "(Filtrado de _MAX_ total Productos",
                    "lengthMenu": "Mostrar _MENU_ Productos",
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
