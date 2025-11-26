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
                        <div class="card-body" style="display:block;">
                            <livewire:admin.compras.items-compra :compra="$compra" />

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h1 class="card-title"><b>Finalizar Compra | Paso 3</b></h1>
                        </div>
                        <div class="card-body" style="display:block;">

                            <form action="{{ route('compras.finalizarCompra', $compra) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre">Sucursal <b>(*)</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                                                    <option value="">Seleccione una Sucursal</option>
                                                    @foreach ($sucursales as $sucursal)
                                                        <option value="{{ $sucursal->id }}"
                                                            {{ old('sucursal_id') == $sucursal->id ? 'selected' : '' }}>
                                                            {{ $sucursal->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('sucursal_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <a href="{{ url('/admin/compras/' . $compra->id . '/enviar-correo') }}"
                                                class="btn btn-primary" style="margin-top: 32px;">
                                                <i class="fas fa-envelope"></i> Enviar Orden al Proveedor
                                            </a>
                                            <button type="submit" class="btn btn-success" style="margin-top: 32px;">
                                                <i class="fas fa-check"></i> Finalizar Compra
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
            @livewireStyles

        @stop

        @section('js')
            @livewireScripts
        @stop
