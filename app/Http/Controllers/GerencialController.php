<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facturas;
use App\Articulos;
use App\Http\Controllers\Session;

class GerencialController extends Controller
{
    public function index(Request $request){
        
        $data = $request->session()->all();
        $gVentausuarios      = DB::select('call GraficasGerenciales(?,?)',array(1, $data["usuario"]));
        $gVentaCategorias    = DB::select('call GraficasGerenciales(?,?)',array(2, $data["usuario"]));
        // var_dump($gVentaCategorias);
       
        return view('gerencial.dashboard', 
                    ['gVentausuarios'    => $gVentausuarios],
                    ['gVentaCategorias'  => $gVentaCategorias] );
    
    }
}


// Pedidos pendientes de facturar
// Vendedor 