@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/compras') }}">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos de la Compra Nro {{ $compra->id }}</li>
        </ol>
    </nav>
    <hr>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h1 class="card-title"><b>Compra Creada</b></h1>
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
                        <div class="col-md-2">
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
                                        value="{{ old('estado', $compra->estado) }}">
                                </div>
                                @error('observaciones')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Sucursal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                                    </div>
                                    <input type="text" name="sucursal" id="sucursal" class="form-control"
                                        value="{{ old('sucursal', optional($sucursal_destino)->nombre) }}">
                                </div>
                                @error('sucursal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Total de la Compra</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                    </div>
                                    <input type="text" name="total" id="total" class="form-control"
                                        value="{{ old('total', $compra->total) }}"
                                        placeholder="Ingrese el total de la compra">
                                </div>
                                @error('total')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h1 class="card-title"><b>Productos de la Compra</b></h1>
                        </div>
                        <div class="card-body" style="display:block;">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nr</th>
                                        <th>Producto</th>
                                        <th>Lote</th>
                                        <th>Cantidad</th>
                                        <th>Precio de Compra</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compra->detalles as $detalle)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detalle->producto->nombre }}</td>
                                            <td>{{ $detalle->lote->codigo_lote }}</td>
                                            <td>{{ $detalle->cantidad }}</td>
                                            <td>{{ $detalle->precio_unitario }}</td>
                                            <td>{{ $detalle->subtotal }}</td>

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
                .select2-container .select2-selection--single {
                    height: 40px !important;
                }
            </style>


        @stop

        @section('js')

        @stop
