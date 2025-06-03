<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Solicitacao;

class DeclaracaoController extends Controller
{
    public function gerar()
    {
        $aluno = Auth::user();
        $horasAprovadas = Solicitacao::where('user_id', $aluno->id)
            ->where('status', 'aprovada')
            ->sum('quantidade_horas');

        $horasMinimas = 100;

        if ($horasAprovadas < $horasMinimas) {
            return redirect()->back()->with('error', 'Você ainda não completou as horas necessárias para gerar a declaração.');
        }

        $data = [
            'nome' => $aluno->name,
            'cpf' => $aluno->cpf,
            'curso' => optional($aluno->curso)->nome ?? 'N/A',
            'horas' => $horasAprovadas,
            'data' => now()->format('d/m/Y'),
        ];

        $pdf = Pdf::loadView('aluno.declaracao.pdf', $data);
        return $pdf->download('declaracao_horas.pdf');
    }
}
