<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\User;

class AlunoController extends Controller
{
     public function index()
    {
        $alunos = Aluno::with(['curso', 'turma'])->get();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('alunos.create', compact('cursos', 'turmas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:alunos,cpf',
            'email' => 'required|email|unique:alunos,email',
            'data_nascimento' => 'required|date',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso.');
    }

    public function edit(Aluno $aluno)
    {
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('alunos.edit', compact('aluno', 'cursos', 'turmas'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:alunos,cpf,' . $aluno->id,
              'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'data_nascimento' => 'required|date',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        $aluno->update($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso.');
    }
}
