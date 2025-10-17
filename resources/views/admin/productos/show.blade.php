@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/productos') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver Datos de un Producto</li>
        </ol>
    </nav>
    <hr>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h1 class="card-title"><b>Datos de Un Producto</b></h1>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/productos/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Categoria </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <select name="categoria_id" id="categoria_id" class="form-control" disabled>
                                                    <option value="">{{ $producto->categoria->nombre }}</option>
                                                </select>
                                            </div>
                                            @error('categoria_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="codigo">Codigo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                                </div>
                                                <input type="text" value="{{ old('codigo', $producto->codigo) }}"
                                                    class="form-control" id="codigo" name="codigo"
                                                    placeholder="Ingrese el codigo del producto" disabled>
                                            </div>
                                            @error('codigo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                                </div>
                                                <input type="text" value="{{ old('nombre', $producto->nombre) }}"
                                                    class="form-control" id="nombre" name="nombre"
                                                    placeholder="Ingrese el nombre del producto" disabled>
                                            </div>
                                            @error('nombre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <p>{!! $producto->descripcion !!}</p>
                                            @error('descripcion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio_compra">Precio Compra</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input style="text-align: center;" type="number"
                                                    value="{{ old('precio_compra', $producto->precio_compra) }}"
                                                    class="form-control" id="precio_compra" name="precio_compra"
                                                    placeholder="Ingrese el precio de compra del producto" disabled>
                                            </div>
                                            @error('precio_compra')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio_venta">Precio Venta</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-money-bill-wave"></i></span>
                                                </div>
                                                <input style="text-align: center;" type="number"
                                                    value="{{ old('precio_venta', $producto->precio_venta) }}"
                                                    class="form-control" id="precio_venta" name="precio_venta"
                                                    placeholder="Ingrese el precio de venta del producto" disabled>
                                            </div>
                                            @error('precio_venta')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock_minimo">Stock Minimo </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input type="number"
                                                    value="{{ old('stock_minimo', $producto->stock_minimo) }}"
                                                    class="form-control" id="stock_minimo" name="stock_minimo"
                                                    placeholder="Ingrese el stock mínimo del producto" disabled>
                                            </div>
                                            @error('stock_minimo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock_maximo">Stock Maximo </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <input type="number"
                                                    value="{{ old('stock_maximo', $producto->stock_maximo) }}"
                                                    class="form-control" id="stock_maximo" name="stock_maximo"
                                                    placeholder="Ingrese el stock máximo del producto" disabled>
                                            </div>
                                            @error('stock_maximo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="unidad_medida">Unidad Medida </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-balance-scale"></i></span>
                                                </div>
                                                <select class="form-control" id="unidad_medida" name="unidad_medida">
                                                    <option value="" disabled selected>
                                                        {{ old('unidad_medida', $producto->unidad_medida) }}</option>
                                                </select>
                                            </div>
                                            @error('unidad_medida')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="estado">Estado </label><br>
                                            @if ($producto->estado == '1')
                                                <span class="badge badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-danger">Inactivo</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="imagen">Imagen del producto </label><br><br>
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                        width="40%" class="img-thumbnail"><br><br>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group text-right">
                            <a href="{{ url('admin/productos') }}" class="btn btn-secondary ">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>

                        </div>
                    </form>
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
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorias",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Categorias",
                        "infoFiltered": "(Filtrado de _MAX_ total Categorias",
                        "lengthMenu": "Mostrar _MENU_ Categorias",
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
        </script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    @stop
