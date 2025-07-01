<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Aluno;

class GraficoController extends Controller
{
   public function index()
{
    $turmas = Turma::with(['alunos.solicitacoes' => function ($query) {
        $query->where('status', 'aprovada');
    }])->get();

    $dadosParaGrafico = [];

        foreach ($turmas as $turma) {
            $totalHoras = 0;
            foreach ($turma->alunos as $aluno) {
                $totalHoras += $aluno->solicitacoes->sum('quantidade_horas');
            }

            $dadosParaGrafico[] = [(string)$turma->ano, $totalHoras];
        }

        return view('graficos.horas', [
            'dadosParaGrafico' => $dadosParaGrafico
        ]);
    }

}
