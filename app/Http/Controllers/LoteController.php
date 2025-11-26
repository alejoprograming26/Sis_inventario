<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;

class LoteController extends Controller
{
    public function index()
    {
       $lotes=Lote::all();
       return response()->json($lotes);
    }
}
