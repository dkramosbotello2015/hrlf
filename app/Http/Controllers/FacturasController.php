<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Facturas;
use App\Articulos;

    

class FacturasController extends Controller
{

    public function vistafacturas(){

        $facturas  = Facturas::all();
        return view('facturas.facturas', ['facturas' => $facturas]);
    
    }

    public function crearfacturas(){

       $articulos  = Articulos::all();
        return view('facturas.crearfactura', ['articulos' => $articulos]);
    
    }

    public function registrafactura(Request $request){
        $data = $request->session()->all();
        
        $tamdetalle  = count($request->input('cantidadarticulo')); 
        


        $cantidadsolicitada  = ($request->input('cantidadarticulo'));
        $codigoarticulo      = ($request->input('idArticulo'));
        
        DB::table('facturas')->insert(
            [   
                'codigopedido' => ($request->input('codigopedido')), 
                'fechafactura' => date("Y-m-d"), 
                'idusuario' => $data["usuario"],
                'idestadofactura' => 2, // Se guarda estado 2 pendiente de calcular
                'idfactordescuento' => 1, // PENDIENTE CALCULAR FACTOR DESCUENTO
                'idperiodo' => 1
            ]
        );

        for ($i=0; $i < $tamdetalle ; $i++) { 

            $precioarticulo = 
                     DB::table('articulos')
                     ->select("precio", "puntos")
                     ->where('idarticulo', '=', $codigoarticulo[$i])
                     ->first();

            // dd($precioarticulo->precio);
            DB::table('detallefacturas')->insert(
                [   
                    'codigopedido'        => $request->input('codigopedido'),
                    'idarticulo'          => $codigoarticulo[$i],
                    'cantidad'            => $cantidadsolicitada[$i],
                    'precioventaasociado' => $precioarticulo->precio,    // ASIGNA COSTO AL DETALLE DE FACTURA. 
                    'puntos' => ($precioarticulo->puntos * $cantidadsolicitada[$i]) // ASIGNA COSTO AL DETALLE DE FACTURA. 
                ]
            );

           $stockactual = 
             DB::table('articulos')
             ->select("stock")
             ->where('idarticulo', '=', $codigoarticulo[$i])
             ->first();

            $nuevostock = $stockactual->stock - $cantidadsolicitada[$i];
            
            // var_dump($nuevostock);

            DB::table('articulos')
            ->where('idarticulo', $codigoarticulo[$i])
            ->update(['stock' => $nuevostock]); 
            
            // INSERCION KARDEX
            DB::table('kardex')->insert(
                [   
                    'idarticulo'        =>   $codigoarticulo[$i],
                    'transaccion'       =>   $request->input('codigopedido'),
                    'cantidadingresada' => - $cantidadsolicitada[$i]
                ]
            );
        }

        $articulos  = Articulos::all();
        return view('facturas.crearfactura', ['articulos' => $articulos]);

    }

    public function procesarfactura(Request $request){
        $codigopedido = $request->input('codigopedido');
        DB::select('call ProcesarFactura(?)',array($codigopedido));
        $facturas  = Facturas::all();
        return view('facturas.facturas', ['facturas' => $facturas]);
    }
}
