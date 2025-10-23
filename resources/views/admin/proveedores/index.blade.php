@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/proveedores') }}">Proveedores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de Proveedores</li>
        </ol>
    </nav>
    <hr>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-orange">
                <div class="card-header">
                    <h1 class="card-title"><b>Proveedores Registrados</b></h1>
                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                            <i class="fas fa-plus"></i> Crear
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="ModalCreateLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ url('admin/proveedores/create') }}" method="POST">
                                        @csrf
                                        <div class="modal-header" style="background-color: #ff9900; color: white;">
                                            <h2 class="modal-title" id="ModalCreateLabel">Crear Proveedor</h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="empresa">Empresa <b>(*)</b></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-building"></i></span>
                                                                </div>
                                                                <input type="text" value="{{ old('empresa') }}"
                                                                    class="form-control" id="empresa" name="empresa"
                                                                    placeholder="Ingrese el nombre de la empresa" required>
                                                            </div>
                                                            @error('empresa')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="direccion">Direccion <b>(*)</b></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-home"></i></span>
                                                                </div>
                                                                <input type="text" value="{{ old('direccion') }}"
                                                                    class="form-control" id="direccion" name="direccion"
                                                                    placeholder="Ingrese la direccion" required>
                                                            </div>
                                                            @error('direccion')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nombre">Nombre <b>(*)</b></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-user"></i></span>
                                                                </div>
                                                                <input type="text" value="{{ old('nombre') }}"
                                                                    class="form-control" id="nombre" name="nombre"
                                                                    placeholder="Ingrese el nombre" required>
                                                            </div>
                                                            @error('nombre')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="telefono">Telefono <b>(*)</b></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-phone"></i></span>
                                                                </div>
                                                                <input type="tel" value="{{ old('telefono') }}"
                                                                    class="form-control" id="telefono" name="telefono"
                                                                    placeholder="Ingrese el telefono" required>
                                                            </div>
                                                            @error('telefono')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="email">Email <b>(*)</b></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-home"></i></span>
                                                                </div>
                                                                <input type="email" value="{{ old('email') }}"
                                                                    class="form-control" id="email" name="email"
                                                                    placeholder="Ingrese el email" required>
                                                            </div>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="text-left">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>
                                                </div>
                                                <div class="text-left">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div> <!-- cierre modal-body -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <table id="example1" class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr class="text-center">
                            <th>Nr</th>
                            <th>Empresa</th>
                            <th>Direciion</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td style="text-align: center;">{{ $proveedor->empresa }}</td>
                                <td style="text-align: center;">{{ $proveedor->direccion }}</td>
                                <td style="text-align: center;">{{ $proveedor->nombre }}</td>
                                <td style="text-align: center;">{{ $proveedor->telefono }}</td>
                                <td style="text-align: center;">{{ $proveedor->email }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <!-- Botón Ver -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#ModalView{{ $proveedor->id }}">
                                            <i class="fas fa-eye"></i> Ver
                                        </button>
                                        <!-- Modal Ver -->
                                        <div class="modal fade" id="ModalView{{ $proveedor->id }}" tabindex="-1"
                                            aria-labelledby="ModalViewLabel{{ $proveedor->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="background-color: #2fb4f1; color: white;">
                                                        <h2 class="modal-title" id="ModalViewLabel{{ $proveedor->id }}">
                                                            Ver Datos del Proveedor</h2>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Empresa</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="fas fa-building"></i></span>
                                                                            </div>
                                                                            <input type="text"
                                                                                value="{{ $proveedor->empresa }}"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Direccion</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="fas fa-home"></i></span>
                                                                            </div>
                                                                            <input type="text"
                                                                                value="{{ $proveedor->direccion }}"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Nombre</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="fas fa-user"></i></span>
                                                                            </div>
                                                                            <input type="text"
                                                                                value="{{ $proveedor->nombre }}"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Telefono</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="fas fa-phone"></i></span>
                                                                            </div>
                                                                            <input type="text"
                                                                                value="{{ $proveedor->telefono }}"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="fas fa-home"></i></span>
                                                                            </div>
                                                                            <input type="text"
                                                                                value="{{ $proveedor->email }}"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="text-left">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Botón Editar -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#ModalEdit{{ $proveedor->id }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <!-- Modal Editar -->
                                        <div class="modal fade" id="ModalEdit{{ $proveedor->id }}" tabindex="-1"
                                            aria-labelledby="ModalEditLabel{{ $proveedor->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ url('admin/proveedores/' . $proveedor->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header"
                                                            style="background-color: #74dc77; color: rgb(0, 0, 0);">
                                                            <h2 class="modal-title"
                                                                id="ModalEditLabel{{ $proveedor->id }}">Editar Proveedor
                                                            </h2>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="empresa">Empresa
                                                                                <b>(*)</b></label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-building"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    value="{{ old('empresa', $proveedor->empresa) }}"
                                                                                    class="form-control" id="empresa"
                                                                                    name="empresa"
                                                                                    placeholder="Ingrese el nombre de la empresa"
                                                                                    required>
                                                                            </div>
                                                                            @error('empresa')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="direccion">Direccion
                                                                                <b>(*)</b></label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-home"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    value="{{ old('direccion', $proveedor->direccion) }}"
                                                                                    class="form-control" id="direccion"
                                                                                    name="direccion"
                                                                                    placeholder="Ingrese la direccion"
                                                                                    required>
                                                                            </div>
                                                                            @error('direccion')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="nombre">Nombre <b>(*)</b></label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-user"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    value="{{ old('nombre', $proveedor->nombre) }}"
                                                                                    class="form-control" id="nombre"
                                                                                    name="nombre"
                                                                                    placeholder="Ingrese el nombre"
                                                                                    required>
                                                                            </div>
                                                                            @error('nombre')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="telefono">Telefono
                                                                                <b>(*)</b></label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-phone"></i></span>
                                                                                </div>
                                                                                <input type="tel"
                                                                                    value="{{ old('telefono', $proveedor->telefono) }}"
                                                                                    class="form-control" id="telefono"
                                                                                    name="telefono"
                                                                                    placeholder="Ingrese el telefono"
                                                                                    required>
                                                                            </div>
                                                                            @error('telefono')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="email">Email <b>(*)</b></label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-home"></i></span>
                                                                                </div>
                                                                                <input type="email"
                                                                                    value="{{ old('email', $proveedor->email) }}"
                                                                                    class="form-control" id="email"
                                                                                    name="email"
                                                                                    placeholder="Ingrese el email"
                                                                                    required>
                                                                            </div>
                                                                            @error('email')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="text-left">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                                <div class="text-left">
                                                                    <button type="submit"
                                                                        class="btn btn-success">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div> <!-- cierre modal-body -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Botón Eliminar -->
                                        <form action="{{ url('/admin/proveedores/' . $proveedor->id) }}"
                                            id="miFormulario{{ $proveedor->id }}" method="post"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); eliminarFormacion('{{ $proveedor->id }}');">
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
    @if ($errors->any())
        <script>
            @if (session('modal_id'))
                var modalId = "{{ session('modal_id') }}";
                $('#ModalEdit' + modalId).modal('show');
            @else
                $('#ModalCreate').modal('show');
            @endif
        </script>
    @endif
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                    "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                    "lengthMenu": "Mostrar _MENU_ Proveedores",
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
