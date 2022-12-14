<?php
use App\Http\Controllers\SitioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;

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
    return view('menu.index');
});

Route::get('/landingpage', [SitioController::class, 'landingpage']);
Route::get('/contacto/{codigo?}', [SitioController::class, 'contacto']);
Route::post('/guardar-contacto', [SitioController::class, 'guardar']);
//Route::resource('/contacto', SitioController::class);


Route::get('/menu', [SitioController::class, 'menu']);
Route::resource('cliente', ClienteController::class);
Route::resource('venta', VentaController::class);
Route::resource('proveedor', ProveedorController::class);
Route::resource('producto', ProductoController::class);

Route::get('/producto/create/{codigo?}', [ProductoController::class, 'show']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified' 
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified' 
])->group(function () {
    Route::get('/menu', function () {
        return view('menu');
    })->name('menu');
});

