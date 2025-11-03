@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/compras') }}">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Compra Nro {{ $compra->id }}</li>
        </ol>
    </nav>
    <hr>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h1 class="card-title"><b>Compra Creada | Paso 1</b></h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Proveedores <b>(*)</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                                        <option value="">
                                            {{ $compra->proveedor->nombre . ' | ' . $compra->proveedor->empresa }}
                                        </option>
                                    </select>
                                </div>
                                @error('proveedor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Fecha de Compra <b>(*)</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="date" name="fecha_compra" id="fecha_compra" class="form-control"
                                        value="{{ old('fecha_compra', $compra->fecha_compra) }}" required>
                                </div>
                                @error('fecha_compra')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Observaciones</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                                    </div>
                                    <input type="text" name="observaciones" id="observaciones" class="form-control"
                                        value="{{ old('observaciones', $compra->observaciones) }}"
                                        placeholder="Ingrese las observaciones de la compra">
                                </div>
                                @error('observaciones')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Estado</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                                    </div>
                                    <input type="text" name="estado" id="estado" class="form-control"
                                        value="{{ old('estado', $compra->estado) }}"
                                        value="{{ old('observaciones', $compra->observaciones) }}">
                                </div>
                                @error('observaciones')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Monto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                    </div>
                                    <input type="text" name="monto" id="monto" class="form-control"
                                        value="{{ old('monto', $compra->total) }}">
                                    @error('monto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h1 class="card-title"><b>Agregar Productos | Paso 2</b></h1>
                        </div>
                        <div class="card-body">



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
