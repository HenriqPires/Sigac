<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\Aluno\AlunoLoginController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\Aluno\DeclaracaoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/dashboard-aluno', function () {
    return view('dashboard-aluno');
})->middleware('auth')->name('dashboard.aluno');


//admin
Route::middleware(['auth'])->group(function () {
    Route::resource('cursos', CursoController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('eixos', EixoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('alunos', AlunoController::class);
    Route::resource('nivels', NivelController::class);

    Route::get('/admin/graficos/horas', [GraficoController::class, 'index'])->name('admin.graficos.horas');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('aluno')->name('aluno.')->group(function () {
    Route::get('/login', [AlunoLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AlunoLoginController::class, 'login']);
    Route::post('/logout', [AlunoLoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->get('/dashboard-aluno', function () {
    return view('dashboard-aluno');
})->name('dashboard.aluno');

// solicitação e declaração
Route::middleware('auth')->prefix('aluno')->name('aluno.')->group(function () {
    Route::get('/solicitacoes', [SolicitacaoController::class, 'index'])->name('solicitacoes.index');
    Route::get('/solicitacoes/create', [SolicitacaoController::class, 'create'])->name('solicitacoes.create');
    Route::post('/solicitacoes', [SolicitacaoController::class, 'store'])->name('solicitacoes.store');

    Route::get('/declaracao', [DeclaracaoController::class, 'gerar'])->name('declaracao');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('solicitacoes', [SolicitacaoController::class, 'adminIndex'])->name('solicitacoes.index');
    Route::patch('solicitacoes/{id}/aprovar', [SolicitacaoController::class, 'aprovar'])->name('solicitacoes.aprovar');
    Route::patch('solicitacoes/{id}/rejeitar', [SolicitacaoController::class, 'rejeitar'])->name('solicitacoes.rejeitar');
});

Route::get('/teste-grafico', function () {
    return view('teste-grafico');
});

require __DIR__.'/auth.php';
