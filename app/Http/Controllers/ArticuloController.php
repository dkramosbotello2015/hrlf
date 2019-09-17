<?php

namespace App\Http\Controllers;

use App\Articulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Articulos  = Articulos::all();
        // var_dump($Articulos);

         return view('Articulo.vistaarticulos', 
                        ["Articulos"            => $Articulos]
                    );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->input('idarticulo'));
        DB::select('call ModificarArticulo(?, ?, ?, ?)', 
            array(
                    $request->idarticulo, 
                    $request->descripcion, 
                    $request->precio, 
                    $request->cantidadaingresar));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 

         $Articulo = 
                         DB::table('articulos')
                         ->select("idarticulo", "precio", "stock", "descripcion")
                         ->where('idarticulo', '=', $id)
                         ->first();
        
        // var_dump($datosArticulo);

        return view('Articulo.mntarticulo', 
            ["Articulo" => $Articulo]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //
    }
}
