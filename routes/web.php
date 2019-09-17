<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::post('/login', function () {
//     return view('welcome');
// });

Route::get('validarusuario',                        'ValidaUsuarioController@listausuarios');
Route::get('validaraccesotipousuario',              'ValidaUsuarioController@validaraccesotipousuario');

Route::get('editarusuario/{correo}/{clave}',        'ValidaUsuarioController@editarusuario');
Route::get('actualizarusuario',                     'ValidaUsuarioController@actualizarusuario');

Route::get('asignacionusuarios/{idusuario}',        'ValidaUsuarioController@asignacionusuarios');

// Articulos
Route::get('vistaarticulos',                        'ArticuloController@index');
Route::get('mantenimientoarticulo/{idarticulo}',    'ArticuloController@edit');
Route::get('modificararticulo',                     'ArticuloController@store');

// facturas
Route::get('vistafacturas',                         'FacturasController@vistafacturas');
Route::get('crearfacturas',                         'FacturasController@crearfacturas');
Route::get('registrafactura',                       'FacturasController@registrafactura');
Route::get('procesarfactura',                       'FacturasController@procesarfactura');
// Dashbord facturas por usuario
Route::get('dashboardventasusuario',                'DashboardventasusuarioController@index');



// Gerencial
Route::get('gerencial',                             'GerencialController@index');
Route::get('kardex/{id}',                           'KardexController@show');

