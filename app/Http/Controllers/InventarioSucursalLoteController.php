<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarioSucursalLote;

class InventarioSucursalLoteController extends Controller
{
    public function index()
    {
        //$inventario_sucursal_lote = InventarioSucursalLote::with('sucursal')->get();
        $sucursales=\App\Models\Sucursal::withCount('inventarioSucursalLotes')->get();
        foreach($sucursales as $sucursal){
           $sucursal->total_inventario = InventarioSucursalLote::where('sucursal_id', $sucursal->id)->sum('cantidad_sucursal');

        }
       // return response()->json($sucursales);

        return view('admin.inventario.sucursales_por_lotes.index', compact('sucursales'));
    }
    public function mostrar_inventario_por_sucursal($id)
    {
        $sucursal = \App\Models\Sucursal::findOrFail($id);
        $inventario_por_sucursal = InventarioSucursalLote::where('sucursal_id', $id)->get();
        return view('admin.inventario.sucursales_por_lotes.mostrar_inventario_por_sucursal', compact('sucursal', 'inventario_por_sucursal'));

    }
}
