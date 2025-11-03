<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Sucursal;
use App\Models\Producto;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        return view('admin.compras.index', compact('compras'));
    }
    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $sucursales = Sucursal::all();
        return view('admin.compras.create', compact('proveedores', 'productos', 'sucursales'));
    }
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'proveedor_id' => 'required|exists:proveedors,id',
            'fecha_compra' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);
        $compra = new Compra();
        $compra->proveedor_id = $request->proveedor_id;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->observaciones = $request->observaciones;
        $compra->total = 0; // Inicializar total en 0
        $compra->estado = 'Pendiente'; // Activo por defecto
        $compra->save();
        return redirect()->route('admin.compras.edit', $compra->id)->with('success', 'Compra creada exitosamente.')->with('icono', 'success');

    }
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $sucursales = Sucursal::all();
        return view('admin.compras.edit', compact('compra', 'proveedores', 'productos', 'sucursales'));
    }

}
