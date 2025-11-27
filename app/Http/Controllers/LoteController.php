<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use Carbon\Carbon;

class LoteController extends Controller
{
    public function index()
    {
       $lotes=Lote::with('producto','proveedor')->get();

       $lotes->each(function($lote){
           $lote->is_expired= Carbon::parse($lote->fecha_vencimiento)->isPast();

       });
       return view('admin.lotes.index',compact('lotes'));
    }
}
