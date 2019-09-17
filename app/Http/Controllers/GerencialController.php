<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facturas;
use App\Articulos;

class GerencialController extends Controller
{
    public function index(){

        $gVentausuarios      = DB::select('call GraficasGerenciales(?)',array(1));
        $gVentaCategorias    = DB::select('call GraficasGerenciales(?)',array(2));


        
        return view('gerencial.dashboard', 
                    ['gVentausuarios'    => $gVentausuarios],
                    ['gVentaCategorias'  => $gVentaCategorias] );
    
    }
}


// Pedidos pendientes de facturar
// Vendedor 