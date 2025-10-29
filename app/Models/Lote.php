<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Proveedor;
class Lote extends Model
{
    protected $table = 'lotes';

    protected $fillable = [

        	"producto_id",
            "proveedor_id",
            "codigo_lote",
            "fecha_entrada",
            "fecha_vencimiento",
            "cantidad_inicial",
            "cantidad_actual",
            "precio_compra",
            "precio_venta",
            "estado",

    ];
    //Pertene a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    //Pertene a un proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
    //Un lote tiene muchas entradas de inventario
    public function inventarioSucursalLotes()
    {
        return $this->hasMany(InventarioSucursalLote::class);
    }
    //Un lote tiene muchos movimientos de inventario
    public function movimientosInventario()
    {
        return $this->hasMany(MovimientoInventario::class);
    }
    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class);
    }

}
