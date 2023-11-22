<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensajeController;
use App\Http\Middleware\MaxLengthMiddleware;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mensajes', [MensajeController::class, 'show'])->name('mensajes');

Route::get('/insertar.mensaje', function () {
    return view('insertar-mensaje');
});
Route::post('/insertar.mensaje', [MensajeController::class, 'store'])
    ->name('insertar.mensaje')
    ->middleware(MaxLengthMiddleware::class);

Route::get('/mensajes/{mensaje}/editar', [MensajeController::class, 'edit'])->name('mensajes.editar');
Route::put('/mensajes', [MensajeController::class, 'update'])->name('mensajes.actualizar')->middleware(MaxLengthMiddleware::class);
Route::delete('/mensajes/{mensaje}', [MensajeController::class, 'destroy'])->name('mensajes.eliminar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
