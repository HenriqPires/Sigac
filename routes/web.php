<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DocumentoController;
use \App\Http\Controllers\AlunoController;
use \App\Http\Controllers\NivelController;




Route::middleware(['auth'])->group(function () {
    Route::resource('cursos', CursoController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('eixos', EixoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('alunos', AlunoController::class);
    Route::resource('nivels', NivelController::class);

});

Route::middleware(['auth', 'auth.aluno'])->get('/dashboard-aluno', function () {
    return view('dashboard-aluno');
})->name('dashboard.aluno');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
