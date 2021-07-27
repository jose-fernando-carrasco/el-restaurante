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
    return view('auth.login');
});
Route::get('/create',[\App\Http\Controllers\clienteController::class,'create'])->name('clientes.create');
Route::post('/',[\App\Http\Controllers\clienteController::class,'store'])->name('clientes.store');

Auth::routes();
Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::middleware(['auth'])->group(function() {

    Route::group(['prefix' => 'usuarios'], function () {
        Route::get('/', [\App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index');
        Route::post('/', [\App\Http\Controllers\UsuarioController::class,'store'])->name('usuarios.store');
        Route::get('/create', [\App\Http\Controllers\UsuarioController::class, 'create'])->name('usuarios.create');
        Route::get('/{id}', [\App\Http\Controllers\UsuarioController::class, 'show'])->name('usuarios.show');
        Route::put('/{id}', [\App\Http\Controllers\UsuarioController::class,'update'])->name('usuarios.update');
        Route::get('/{id}/edit', [\App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuarios.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\UsuarioController::class,'destroy'])->name('usuarios.destroy');
    });
    Route::group(['prefix' => 'alimentos'], function () {
        Route::get('/', [\App\Http\Controllers\alimentocontroller::class, 'index'])->name('alimentos.index');
        Route::post('/', [\App\Http\Controllers\alimentocontroller::class,'store'])->name('alimentos.store');
        Route::get('/create', [\App\Http\Controllers\alimentocontroller::class, 'create'])->name('alimentos.create');
        Route::get('/{id}', [\App\Http\Controllers\alimentocontroller::class, 'show'])->name('alimentos.show');
        Route::put('/{id}', [\App\Http\Controllers\alimentocontroller::class,'update'])->name('alimentos.update');
        Route::get('/{id}/edit', [\App\Http\Controllers\alimentocontroller::class, 'edit'])->name('alimentos.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\alimentocontroller::class,'destroy'])->name('alimentos.destroy');
    });
    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', [\App\Http\Controllers\menucontroller::class, 'index'])->name('menus.index');
        Route::post('/', [\App\Http\Controllers\menucontroller::class,'store'])->name('menus.store');
        Route::get('/create', [\App\Http\Controllers\menucontroller::class, 'create'])->name('menus.create');
        Route::get('/{id}', [\App\Http\Controllers\menucontroller::class, 'show'])->name('menus.show');
        Route::put('/{id}', [\App\Http\Controllers\menucontroller::class,'update'])->name('menus.update');
        Route::get('/{id}/edit', [\App\Http\Controllers\menucontroller::class, 'edit'])->name('menus.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\menucontroller::class,'destroy'])->name('menus.destroy');
    });
    Route::group(['prefix' => 'bitacoras'], function () {
        Route::get('/', [\App\Http\Controllers\bitacoracontroller::class, 'index'])->name('bitacoras.index');
          });
    Route::group(['prefix' => 'alimentomenus'], function () {
        Route::get('/', [\App\Http\Controllers\alimento_menu_controller::class, 'index'])->name('alimentomenus.index');
        Route::post('/', [\App\Http\Controllers\alimento_menu_controller::class,'store'])->name('alimentomenus.store');
        Route::get('/create', [\App\Http\Controllers\alimento_menu_controller::class, 'create'])->name('alimentomenus.create');
        Route::get('/{id}', [\App\Http\Controllers\alimento_menu_controller::class, 'show'])->name('alimentomenus.show');
        Route::put('/{id}', [\App\Http\Controllers\alimento_menu_controller::class,'update'])->name('alimentomenus.update');
        Route::get('/{id}/edit', [\App\Http\Controllers\alimento_menu_controller::class, 'edit'])->name('alimentomenus.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\alimento_menu_controller::class,'destroy'])->name('alimentomenus.destroy');
    });

    Route::group(['prefix' => 'pedidos'], function () {
        Route::get('/', [\App\Http\Controllers\pedidocontroller::class, 'index'])->name('pedidos.index');
        Route::post('/', [\App\Http\Controllers\pedidocontroller::class,'store'])->name('pedidos.store');
        Route::get('/create', [\App\Http\Controllers\pedidocontroller::class, 'create'])->name('pedidos.create');
        Route::get('/{id}', [\App\Http\Controllers\pedidocontroller::class, 'show'])->name('pedidos.show');
        Route::put('/{id}', [\App\Http\Controllers\pedidocontroller::class,'update'])->name('pedidos.update');
        Route::get('/{id}/edit', [\App\Http\Controllers\pedidocontroller::class, 'edit'])->name('pedidos.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\pedidocontroller::class,'destroy'])->name('pedidos.destroy');
    });


    Route::group(['prefix' => 'clientes'], function () {
       Route::get('/',[\App\Http\Controllers\clienteController::class,'index'])->name('clientes.index');

       Route::get('/{id}',[\App\Http\Controllers\clienteController::class,'show'])->name('clientes.show');
       Route::put('/{id}',[\App\Http\Controllers\clienteController::class,'update'])->name('clientes.update');
       Route::get('/{id}/edit',[\App\Http\Controllers\clienteController::class,'edit'])->name('clientes.edit');
       Route::get('{id}/destroy',[\App\Http\Controllers\clienteController::class,'destroy'])->name('clientes.destroy');
    });
    Route::group(['prefix' => 'restaurante'], function () {
       Route::get('/edit',[\App\Http\Controllers\inforestcontroller::class,'edit'])->name('restaurante.edit');
         });

    Route::group(['prefix' => 'cajeros'], function () {
        Route::get('/',[\App\Http\Controllers\cajeroController::class,'index'])->name('cajeros.index');
        Route::post('/',[\App\Http\Controllers\cajeroController::class,'store'])->name('cajeros.store');
        Route::get('/create',[\App\Http\Controllers\cajeroController::class,'create'])->name('cajeros.create');
        Route::get('/{id}',[\App\Http\Controllers\cajeroController::class,'show'])->name('cajeros.show');
        Route::put('/{id}',[\App\Http\Controllers\cajeroController::class,'update'])->name('cajeros.update');
        Route::get('/{id}/edit',[\App\Http\Controllers\cajeroController::class,'edit'])->name('cajeros.edit');
        Route::get('{id}/destroy',[\App\Http\Controllers\cajeroController::class,'destroy'])->name('cajeros.destroy');
    });

    Route::group(['prefix' => 'administradores'], function () {
        Route::get('/',[\App\Http\Controllers\AdministradorController::class,'index'])->name('administradores.index');
        Route::post('/',[\App\Http\Controllers\AdministradorController::class,'store'])->name('administradores.store');
        Route::get('/create',[\App\Http\Controllers\AdministradorController::class,'create'])->name('administradores.create');
        Route::get('/{id}',[\App\Http\Controllers\AdministradorController::class,'show'])->name('administradores.show');
        Route::put('/{id}',[\App\Http\Controllers\AdministradorController::class,'update'])->name('administradores.update');
        Route::get('/{id}/edit',[\App\Http\Controllers\AdministradorController::class,'edit'])->name('administradores.edit');
        Route::get('{id}/destroy',[\App\Http\Controllers\AdministradorController::class,'destroy'])->name('administradores.destroy');
    });

    Route::group(['prefix' => 'reservas'], function () {
        Route::get('/',[\App\Http\Controllers\reservaController::class,'index'])->name('reservas.index');
        Route::post('/{id}',[\App\Http\Controllers\reservaController::class,'store'])->name('reservas.store');
        Route::get('/create/{id}',[\App\Http\Controllers\reservaController::class,'create'])->name('reservas.create');
        Route::get('/{id}',[\App\Http\Controllers\reservaController::class,'show'])->name('reservas.show');
        Route::put('/{id}',[\App\Http\Controllers\reservaController::class,'update'])->name('reservas.update');
        Route::get('/{id}/edit',[\App\Http\Controllers\reservaController::class,'edit'])->name('reservas.edit');
        Route::get('{id}/destroy',[\App\Http\Controllers\reservaController::class,'destroy'])->name('reservas.destroy');
    });

    Route::resource('roles',\App\Http\Controllers\rolecontroller::class)->names('roles');





});
