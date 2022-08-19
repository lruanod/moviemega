<?php

use Illuminate\Support\Facades\Route;

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
    return view('d_index.index');
});
Route::get('/indexp', function () {
    return view('d_index.indexp');
});


Route::get('/categorias', function () {
    return view('d_categorias.categorias');
});
Route::get('/lenguajes', function () {
    return view('d_lenguajes.lenguajes');
});
Route::get('/peliculas', function () {
    return view('d_peliculas.peliculas');
});
Route::get('/descargas', function () {
    return view('d_descargas.descargas');
});
Route::get('/servidors', function () {
    return view('d_servidors.servidors');
});



Route::get('/pcategorias', function () {
    return view('d_pcategorias.pcategorias');
});
Route::get('/programas', function () {
    return view('d_programas.programas');
});


Route::get('/legal', function () {
    return view('d_legal.legal');
});

Route::get('/showpelicula/{pel_id}', function ($pel_id) {
    $data['pel_id']=$pel_id;
    return view('d_showpelicula.show',$data);
});
Route::get('/showdescarga/{des_id}', function ($des_id) {
    $data['des_id']=$des_id;
    return view('d_showpelicula.showd',$data);
});
Route::get('/showonline/{des_id}', function ($des_id) {
    $data['des_id']=$des_id;
    return view('d_showpelicula.showo',$data);
});

Route::get('/showprograma/{pro_id}', function ($pro_id) {
    $data['pro_id']=$pro_id;
    return view('d_showprograma.show',$data);
});

Route::get('/showpdescarga/{des_id}', function ($des_id) {
    $data['des_id']=$des_id;
    return view('d_showprograma.showd',$data);
});

Route::get('/usuarios', function () {
    return view('d_usuarios.usuarios');
});

Route::get('/login', function () {
    return view('d_login.login');
});
