<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventarioSucursalLote extends Model
{
    protected $table = 'inventario_sucursal_lote';
    protected $fillable = [
        'sucursal_id',
        'lote_id',
        'cantidad_sucursal',

    ];


    // Relación con Lote
    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
    // Relación con Sucursal
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

}
