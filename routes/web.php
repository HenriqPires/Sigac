<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\Aluno\AlunoLoginController;
use App\Http\Controllers\Aluno\AlunoRegisterController;

Route::middleware(['auth'])->group(function () {
    Route::resource('cursos', CursoController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('eixos', EixoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('alunos', AlunoController::class);
    Route::resource('nivels', NivelController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('aluno')->name('aluno.')->group(function () {
    Route::get('/login', [AlunoLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AlunoLoginController::class, 'login']);
    Route::post('/logout', [AlunoLoginController::class, 'logout'])->name('logout');

    Route::get('/register', [AlunoRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AlunoRegisterController::class, 'register']);
});

Route::middleware(['auth:aluno'])->group(function () {
    Route::get('/dashboard-aluno', function () {
        return view('dashboard-aluno');
    })->name('dashboard.aluno');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';