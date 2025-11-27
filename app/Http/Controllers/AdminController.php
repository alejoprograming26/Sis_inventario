<?php

namespace App\Http\Controllers;
use App\Models\Sucursal;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Compra;
use App\Models\Lote;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function index()
    {
        $totalSucursales = Sucursal::count();
        $totalCategorias = Categoria::count();
        $totalProductos = Producto::count();
        $totalProveedores = Proveedor::count();
        $totalCompras = Compra::count();
        $totalLotesVencidos = Lote::where('fecha_vencimiento', '<', Carbon::now())->count();

        return view('admin.index', compact('totalSucursales', 'totalCategorias', 'totalProductos', 'totalProveedores', 'totalCompras', 'totalLotesVencidos'));
    }
}
