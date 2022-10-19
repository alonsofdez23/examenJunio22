<?php

use App\Http\Controllers\ProductoController;
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
    return view('inicio');
})->name('inicio');

Route::get('/compra', [ProductoController::class, 'index'])
    ->name('productos.index');

Route::post('/compra', [ProductoController::class, 'addLinea'])
    ->name('productos.store');

Route::delete('/compra/{producto}', [ProductoController::class, 'deleteLinea'])
    ->name('productos.destroy');

Route::delete('/compra', [ProductoController::class, 'vaciarCarrito'])
    ->name('productos.alldestroy');

Route::get('/ticket', [ProductoController::class, 'pasarelaPago'])
    ->name('productos.pago');

Route::post('/ticket', [ProductoController::class, 'pagarTicket'])
    ->name('productos.ticket');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

require __DIR__.'/auth.php';
