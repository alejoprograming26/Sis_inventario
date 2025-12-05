<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovimientoInventario;

class MovimientoInventarioController extends Controller
{
    public function index()
    {
        $movimientos = MovimientoInventario::all();
        //return response()->json($movimientos);

        return view('admin.inventario.movimientos.index', compact('movimientos'));
    }
}
