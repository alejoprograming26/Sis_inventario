<?php

namespace App\Livewire\Admin\Compras;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Lote;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Exception;
class ItemsCompra extends Component
{

    public Compra $compra;
    public $productoId;
    public $cantidad = 1;
    public $precioUnitario;
    public $precioCompra;
    public $precioVenta;
    public $fechaVencimiento;
    public $codigoLote;
    public $productos;
    public $totalCompra;

    //Se ejecuta cuando se carga inicialmente
    public function mount(compra $compra){
        $this->compra=$compra;
        $this->productos=Producto::all();
        $this->cargarDatos();
    }
    public function cargarDatos(){
        $this->compra->load('detalles.producto', 'detalles.lote');
        $this->totalCompra = $this->compra->detalles->sum('subtotal');
        //Reiniciar campos dentro del Formulario
        $this->reset(['productoId', 'cantidad', 'precioUnitario','precioCompra', 'precioVenta', 'fechaVencimiento', 'codigoLote']);
        $this->cantidad = 1;

    }
    protected $rules = [
        'productoId' => 'required',
        'cantidad' => 'required|integer|min:1',
        'codigoLote' => 'required',
        'precioCompra' => 'required',
        'precioVenta' => 'required',
        'fechaVencimiento' => 'required',
    ];

    public function agregarItems(){
        // Debug temporal
        //dd($this->productoId);

        $this->validate();
            DB::beginTransaction();
            try {
                    $producto = Producto::find($this->productoId);
                    $loteId = null;
                    //Creacion del Lote
                    $lote = Lote::create([
                        'producto_id' => $producto->id,
                        'proveedor_id' => $this->compra->proveedor->id,
                        'codigo_lote' => $this->codigoLote,
                        'fecha_entrada' => now()->toDateString(),
                        'fecha_vencimiento' => $this->fechaVencimiento,
                        'cantidad_inicial' => 0,
                        'cantidad_actual' => 0,
                        'precio_compra' => $this->precioCompra,
                        'precio_venta' => $this->precioVenta,
                        'estado'=> true,

                    ]);
                    $loteId = $lote->id;

                    //Creacion de detalle de compra
                    $this->compra->detalles()->create([
                        'producto_id' => $producto->id,
                        'lote_id' => $loteId,
                        'cantidad' => $this->cantidad,
                        'precio_unitario' => $this->precioCompra,
                        'subtotal' => $this->cantidad * $this->precioCompra,
                    ]);

                    $this->compra->total = $this->compra->detalles->sum('subtotal');
                    $this->compra->save();
                    DB::commit();
                    $this->cargarDatos();
                    $this->dispatch(
                           'mostrar-alert',
                            icono: 'success',
                            mensaje: 'Se ha agregado el producto correctamente.'
                            );
                }catch(Exception $e) {
                //dd('error' . $e->getMessage());
                DB::rollBack();
            }

    }

    public function render()
    {
        return view('livewire.admin.compras.items-compra');
    }

    public function eliminarItem($detalleId){
        DB::beginTransaction();
        try {
            $detalle= DetalleCompra::find($detalleId);
            $lote_id = $detalle->lote_id;
            $lote= Lote::find($lote_id);
            $lote->delete();
            $detalle->delete();


            //Recalcular el total de la compra después de eliminar el detalle
            $this->compra->total = $this->compra->detalles->sum('subtotal');
            $this->compra->save();
            DB::commit();
            $this->cargarDatos();
            $this->dispatch(
                'mostrar-alert',
                icono: 'success',
                mensaje: 'Se ha eliminado el producto correctamente.'
            );
        } catch (Exception $e) {

            DB::rollBack();
            dd('error al eliminar' . $e->getMessage());
        }

    }
}
