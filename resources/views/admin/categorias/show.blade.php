@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/categorias') }}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos de la Categorias</li>
        </ol>
    </nav>
    <hr>

@stop
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h1 class="card-title"><b>Ver Datos de la Categoria</b></h1>
                </div>
                <div class="card-body" style="display: block;">
                    <form action="{{ url('admin/categorias/create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre <b>(*)</b></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese el nombre de la categoría" readonly
                                    value="{{ $categoria->nombre }}">
                            </div>
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción de la categoría <b>(Opcional)</b></label>
                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción de la categoría"
                                readonly>{{ $categoria->descripcion }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group text-right">
                            <a href="{{ url('admin/categorias') }}" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-arrow-left"></i> Volver</a>

                        </div>
                    </form>
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

        @stop
