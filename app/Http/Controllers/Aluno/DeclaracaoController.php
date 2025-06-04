<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Solicitacao;
use App\Models\Aluno;


class DeclaracaoController extends Controller
{
    public function gerar()
    {
        $aluno = Aluno::where('user_id', Auth::id())->firstOrFail();

        $horasAprovadas = Solicitacao::where('user_id', $aluno->user_id)
            ->where('status', 'aprovada')
            ->sum('quantidade_horas');

        $horasMinimas = 100;

        if ($horasAprovadas < $horasMinimas) {
            return redirect()->back()->with('error', 'Você ainda não completou as horas necessárias para gerar a declaração.');
        }

        $data = [
            'nome' => $aluno->nome,
            'cpf' => $aluno->cpf,
            'curso' => optional($aluno->curso)->nome ?? 'N/A',
            'horas' => $horasAprovadas,
            'data' => now()->format('d/m/Y'),
        ];

        $pdf = Pdf::loadView('aluno.declaracao.pdf', $data);
        return $pdf->download('declaracao_horas.pdf');
    }
}
