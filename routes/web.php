<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HistorialMedicoController;
use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::resource('pacientes', PacienteController::class)->middleware(['auth']);

Route::get('/pacientes/{paciente}/historial', [HistorialMedicoController::class, 'index'])->name('pacientes.historial');
Route::get('/pacientes/{paciente}/historial/create', [HistorialMedicoController::class, 'create'])->name('pacientes.historial.create');
Route::post('/pacientes/{paciente}/historial', [HistorialMedicoController::class, 'store'])->name('pacientes.historial.store');
Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');

Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
Route::get('/citas/create/{paciente?}', [CitaController::class, 'create'])->name('citas.create');
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');
Route::post('/citas/{cita}/cambiar-estado', [CitaController::class, 'cambiarEstado'])->name('citas.cambiarEstado');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
