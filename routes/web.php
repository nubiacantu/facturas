<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReceptoraController;
use App\Http\Controllers\EmisoraController;
use App\Http\Controllers\FacturaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//Ruta para Login
Route::get('/login',[LoginController::class,'index'])->name('login');
//Ruta de validacion del login
Route::post('/login',[LoginController::class,'store']);
//Ruta de validacion del logout
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
// Route::get('/logout',[LogoutController::class,'store'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Ruta para mostrar listado de  empresas receptoras
Route::get('/EmpresaReceptora',[ReceptoraController::class,'index'])->name('receptora.index');

//Rutas para agregar empresas receptoras
Route::post('/EmpresaReceptora',[ReceptoraController::class,'store'])->name('receptora.store');
Route::get('/EmpresaReceptora/Nueva', [ReceptoraController::class, 'create'])->name('receptora.create');

//ruta para eliminar empresas receptora de un id
Route::delete('/EmpresaReceptora/{id}', [ReceptoraController::class, 'delete'])->name('receptora.delete');


//Ruta para mostrar listado de  empresas emisoras
Route::get('/EmpresaEmisora',[EmisoraController::class,'index'])->name('emisora.index');

//Rutas para agregar empresas emisoras
Route::post('/EmpresaEmisora',[EmisoraController::class,'store'])->name('emisora.store');
Route::get('/EmpresaEmisora/Nueva', [EmisoraController::class, 'create'])->name('emisora.create');

//ruta para eliminar empresas emisora de un id
Route::delete('/EmpresaEmisora/{id}', [EmisoraController::class, 'delete'])->name('emisora.delete');


//Ruta para mostrar listado de facturas
Route::get('/Facturas',[FacturaController::class,'index'])->name('factura.index');

//Rutas para agregar facturas
Route::post('/Facturas',[FacturaController::class,'store'])->name('factura.store');
Route::get('/Facturas/Nueva', [FacturaController::class, 'create'])->name('factura.create');

//ruta para eliminar factura de un id
Route::delete('/Facturas/{id}', [FacturaController::class, 'delete'])->name('factura.delete');

//ruta para enviar datos al servidor
Route::post('/pdf', [FacturaController::class,'store_pdf'])->name('pdf.store');
