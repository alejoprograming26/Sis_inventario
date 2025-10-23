<?php

namespace App\Http\Controllers;
use App\Models\Sucursal;
use App\Models\Categoria;
class AdminController extends Controller
{
    public function index()
    {
        $totalSucursales = Sucursal::count();
        $totalCategorias = Categoria::count();
        return view('admin.index', compact('totalSucursales', 'totalCategorias'));
    }
}
