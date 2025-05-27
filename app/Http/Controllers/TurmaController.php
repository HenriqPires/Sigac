<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
     public function index()
    {
        $turmas = Turma::with('curso')->get();
        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('turmas.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        Turma::create($request->all());
        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso.');
    }

    public function edit(Turma $turma)
    {
        $cursos = Curso::all();
        return view('turmas.edit', compact('turma', 'cursos'));
    }

    public function update(Request $request, Turma $turma)
    {
        $turma->update($request->all());
        return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso.');
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso.');
    }
}
