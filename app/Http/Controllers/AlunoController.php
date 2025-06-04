<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'data_nascimento' => 'required|date',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => 'aluno',
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'data_nascimento' => $request->data_nascimento,
            'curso_id' => $request->curso_id,
            'turma_id' => $request->turma_id,
            'user_id' => $user->id,
        ]);

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
            'email' => 'required|email|unique:users,email,' . $aluno->user_id,
            'data_nascimento' => 'required|date',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        $aluno->user->update([
            'name' => $request->nome,
            'email' => $request->email,
        ]);

        $aluno->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'curso_id' => $request->curso_id,
            'turma_id' => $request->turma_id,
        ]);

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->user()->delete();
        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso.');
    }
}