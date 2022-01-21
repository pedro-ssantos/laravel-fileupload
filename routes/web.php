<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PacienteUploadController;
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
    return view('welcome');
});

Route::resource('pacientes', PacienteController::class)->except([
    'show',
])->middleware(['auth']);
Route::get('/pacientes/import', [PacienteUploadController::class, 'index'])->middleware(['auth']);
Route::post('/pacientes/import', [PacienteUploadController::class, 'store'])->middleware(['auth']);

Route::get('/dashboard', function () {
    return redirect()->route('pacientes.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
