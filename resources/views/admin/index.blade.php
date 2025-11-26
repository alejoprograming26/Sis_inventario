@extends('adminlte::page')


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Admin</p>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('admin/sucursales') }}">
                    <span class="info-box-icon bg-info">
                        <img src="{{ url('/img/ubicacion.gif') }}" width="" alt="">
                    </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 22pt" style=""><b>Sucursales </b></span>
                    <span class="info-box-number" style="font-size:14pt">
                        {{ $totalSucursales }} Totales
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('admin/categorias') }}">
                    <span class="info-box-icon bg-info">
                        <img src="{{ url('/img/categoria.gif') }}" width="" alt="">
                    </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 22pt"><b>Categorias </b></span>
                    <span class="info-box-number" style="font-size:14pt">
                        {{ $totalCategorias }} Totales
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('admin/productos') }}">
                    <span class="info-box-icon bg-info">
                        <img src="{{ url('/img/carrito.gif') }}" width="" alt="">
                    </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 22pt"><b>Productos </b></span>
                    <span class="info-box-number" style="font-size:14pt">
                        {{ $totalProductos }} Totales
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('admin/proveedores') }}">
                    <span class="info-box-icon bg-info">
                        <img src="{{ url('/img/comentario.gif') }}" width="" alt="">
                    </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 22pt"><b>Proveedores </b></span>
                    <span class="info-box-number" style="font-size:14pt">
                        {{ $totalProveedores }} Totales
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('admin/compras') }}">
                    <span class="info-box-icon bg-info">
                        <img src="{{ url('/img/bolsa.gif') }}" width="" alt="">
                    </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 22pt"><b>Compras </b></span>
                    <span class="info-box-number" style="font-size:14pt">
                        {{ $totalCompras }} Totales
                    </span>
                </div>
            </div>
        </div>


    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
