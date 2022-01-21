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

Route::resource('pacientes', PacienteController::class)->except([
    'show',
]);
Route::get('/pacientes/import', [PacienteUploadController::class, 'index']);
Route::post('/pacientes/import', [PacienteUploadController::class, 'store']);
Route::get('/', function () {
    return view('welcome');
});
