<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use App\Mail\CompraProveedorMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\InventarioSucursalLote;
use App\Models\MovimientoInventario;
use Exception;

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
        // return response()->json($request->all());
        $request->validate([
            'proveedor_id' => 'required|exists:proveedors,id',
            'fecha_compra' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);
        $compra = new Compra;
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
    public function enviarCorreo(Compra $compra)
    {
        $compra->load('detalles.producto', 'proveedor');
        $compra->estado = 'Enviado';
        $compra->save();
        $proveedorEmail = $compra->proveedor->email;
        Mail::to($proveedorEmail)->send(new CompraProveedorMail($compra));
        return redirect()->back()->with('mensaje', 'Correo enviado al proveedor exitosamente.')->with('icono', 'success');
    }
    public function finalizarCompra(Request $request, Compra $compra)
    {
        $compra->load('detalles.producto', 'proveedor');

        if($compra->detalles->isEmpty()){
           return redirect()->back()->with('mensaje', 'No se puede finalizar la Compra Sin Productos.')->with('icono', 'error');
        }
        $request->validate([
            'sucursal_id' => 'required',
        ]);
            DB::beginTransaction();
            try {
                foreach ($compra->detalles as $detalle) {
                   $lote = $detalle->lote;
                   $producto= $detalle->producto;
                   //actualizar la cantidad del lote
                     $lote->cantidad_actual= $detalle->cantidad_actual+ $detalle->cantidad;
                     $lote->save();

                    //actualizar el registro de inventario sucursal_lote
                    $inventarioLote= InventarioSucursalLote::firstOrCreate([

                        'lote_id' => $lote->id,
                        'sucursal_id' => $request->sucursal_id,
                        'cantidad_sucursal' => 0,

                    ]);
                    $inventarioLote->cantidad_sucursal = $inventarioLote->cantidad_sucursal + $detalle->cantidad;
                    $inventarioLote->save();

                    //Registrar movimiento en la tabla movimientos_inventario (si existe)
                    $movimientoInventario = MovimientoInventario::create([
                        'producto_id' => $producto->id,
                        'lote_id' => $lote->id,
                        'sucursal_id' => $request->sucursal_id,
                        'tipo_movimiento' => 'Entrada',
                        'cantidad' => $detalle->cantidad,
                        'fecha' => now(),
                    ]);

                }
                $compra->estado = 'Finalizada';
                $compra->save();
                DB::commit();
                return redirect()->route('admin.compras.index')->with('mensaje', 'Compra finalizada Realizada exitosamente.')->with('icono', 'success');

                }catch(Exception $e) {

                DB::rollBack();
                dd('error al finalizar la compra: ' . $e->getMessage());
            }



    }
    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->load('detalles.producto', 'proveedor');
        $movimientoEntrada= MovimientoInventario::whereHas('lote', function ($query) use ($compra) {
            $query->whereIn('id', $compra->detalles->pluck('lote_id'));
        })->where('tipo_movimiento', 'Entrada')->first();
        $sucursal_destino= null;
        if($movimientoEntrada){
            $sucursal_destino= Sucursal::find($movimientoEntrada->sucursal_id);
        }
        return view('admin.compras.show', compact('compra', 'movimientoEntrada', 'sucursal_destino'));

    }
    public function destroy($id)
    {
        $compra = Compra::with('detalles')->findOrFail($id);

            DB::beginTransaction();
            try {

                 foreach($compra->detalles as $detalle) {

                  $lote= $detalle->lote;
                    //eliminar el lote asociado al detalle de compra
                    $lote->delete();

                  $detalle->delete();
                }
                $compra->delete();

                DB::commit();
                return redirect()->route('admin.compras.index')->with('mensaje', 'Compra Eliminada exitosamente.')->with('icono', 'success');

                }catch(Exception $e) {

                DB::rollBack();
                dd('error al finalizar la compra: ' . $e->getMessage());
            }
    }
}

