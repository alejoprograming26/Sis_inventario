<?php

namespace App\Livewire\Admin\Compras;
use App\Models\Compra;
use App\Models\Lote;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ItemsCompra extends Component
{

    public Compra $compra;
    public $productoId;
    public $cantidad = 1;
    public $precioUnitario;
    public $fechaVencimiento;
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
        $this->reset(['productoId', 'cantidad', 'precioUnitario', 'fechaVencimiento', 'productos', 'totalCompra']);
        $this->cantidad = 1;

    }
    public function agregarItems(){
        $this->validate();
            DB::beginTransaction();
            try {
                    $producto = Producto::find($this->productoId);
                    $loteId = null;
                    $lote = Lote::create([
                        'producto_id' => $producto->id,
                        'proveedor_id' => $this->compra->proveedor_id,
                        'cantidad' => $this->cantidad,
                    ]);

                }

            catch (\Exception $e) {

            }

    }

    public function render()
    {
        return view('livewire.admin.compras.items-compra');
    }
}
