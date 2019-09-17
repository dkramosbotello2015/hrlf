<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ValidaUsuarioController extends Controller
{
    public function index(){

        $usuarios = DB::table('usuarios')->get();
        // DB::statement('call new_user(?, ?, ?, ?)',["myemail@test.com","mypassword","myname","mysurname"]);
        return view('usuarios.listausuarios', ['usuarios' => $usuarios]);
    
    }

    public function listausuarios(Request $request){
        // var_dump($request->input('clave'));
        $usuarios 
        = DB::table('usuarios')
            ->leftJoin('tipousuarios', 'usuarios.idtipousuario', '=', 'tipousuarios.idtipousuario')
            ->where('usuarios.estado','=',true)
            ->get();
        return view('usuarios.listausuarios', ['usuarios' => $usuarios]);
    }


    public function editarusuario($correo, $clave){
        $usuario 
        = DB::table('usuarios')
            ->leftJoin('tipousuarios', 'usuarios.idtipousuario', '=', 'tipousuarios.idtipousuario')
            ->where('usuarios.correo','=',$correo)
            ->first();

        return view('usuarios.editarusuario', ['usuario' => $usuario]);

    }

    public function actualizarusuario(Request $request){
        
        $correo = ($request->input('correo'));
        $clave  = ($request->input('clave'));
        

        DB::select('call ActualizarUsuario(?,?)',array($correo,$clave));

        $usuarios 
        = DB::table('usuarios')
            ->leftJoin('tipousuarios', 'usuarios.idtipousuario', '=', 'tipousuarios.idtipousuario')
            ->where('usuarios.estado','=',true)
            ->get();

        
        return view('usuarios.listausuarios', ['usuarios' => $usuarios]);
    }

    public function validaraccesotipousuario(Request $request){
        
        $correo = ($request->input('correo'));
        $clave  = ($request->input('clave'));
        
        // var_dump($clave);

        $usuarios
        = DB::table('usuarios')
            ->where('usuarios.correo','=',$correo)
            ->where('usuarios.clave','=',base64_encode($clave))
            ->first();


        if ($usuarios){
            // SETEANDO ID DE USUARIO
            $request->session()->put('usuario', $usuarios->idusuario);
            // $data = $request->session()->all();
            $usuarios 
            = DB::table('usuarios')
                ->leftJoin('tipousuarios', 'usuarios.idtipousuario', '=', 'tipousuarios.idtipousuario')
                ->where('usuarios.estado','=',true)
                ->get();

            session()->regenerate();
            return view('usuarios.listausuarios', ['usuarios' => $usuarios]);
        }else
        {
            return redirect()->back()->with('alert', 'Usuario no registrado!');
        }
        
    }

    public function asignacionusuarios($id){
        // $usuarios = DB::table('usuarios')->get();

        $usuarioasignado = 
            DB::table('usuarios')
            ->leftJoin('asignacionpadreshijos', 'usuarios.idusuario', '=', 'asignacionpadreshijos.idusuariohijo')
            ->where('asignacionpadreshijos.idusuariopadre','=', $id)
            ->get();

        var_dump($usuarioasignado);
        // return view('usuarios.listausuarios', ['usuarios' => $usuarios]);   
    }
}
