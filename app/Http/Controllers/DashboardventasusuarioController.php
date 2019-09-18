<?php

namespace App\Http\Controllers;

use App\dashboardventasusuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardventasusuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->session()->all();
        $ventasusuario   = DB::select('call CalcVentasUsuario(?,?)',array(1, 1));
        $tamLineas       = count($ventasusuario);

        $Rentabilidad    = DB::select('call CalcVentasUsuario(?,?)',array(1, 2));
        $usuarioasignado = DB::select('call CalcVentasUsuarioUsuariosAsociados(?,?)',array(1,1));
        $gPuntosAcumulados   = DB::select('call GraficasGerenciales(?,?)',array(3, $data["usuario"]));
        // var_dump($ventasusuario);

        return view('usuarios.dashboardventasusuario', 
                        ["tamLineas"            => $tamLineas, 
                         "ventasusuario"        => $ventasusuario,
                         "Rentabilidad"         => $Rentabilidad,
                         "UsuariosAsigna"       => $usuarioasignado,
                         "PuntosUsuario"        => $gPuntosAcumulados[0]->PuntosUsuario
                        ]
                    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("vista de facturas");
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dashboardventasusuario  $dashboardventasusuario
     * @return \Illuminate\Http\Response
     */
    public function show(dashboardventasusuario $dashboardventasusuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dashboardventasusuario  $dashboardventasusuario
     * @return \Illuminate\Http\Response
     */
    public function edit(dashboardventasusuario $dashboardventasusuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dashboardventasusuario  $dashboardventasusuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dashboardventasusuario $dashboardventasusuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dashboardventasusuario  $dashboardventasusuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(dashboardventasusuario $dashboardventasusuario)
    {
        //
    }
}
