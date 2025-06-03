<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;



class SolicitacaoController extends Controller
{
    public function create()
{
    return view('solicitacoes.create');
}

public function store(Request $request)
{
    $request->validate([
        'atividade' => 'required|string|max:255',
        'descricao' => 'required|string',
        'quantidade_horas' => 'required|integer|min:1',
        'comprovante' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    ]);

    $path = null;
    if ($request->hasFile('comprovante')) {
        $path = $request->file('comprovante')->store('comprovantes', 'public');
    }

    Solicitacao::create([
        'user_id' =>Auth::guard('aluno')->id(),
        'atividade' => $request->atividade,
        'descricao' => $request->descricao,
        'quantidade_horas' => $request->quantidade_horas,
        'comprovante' => $path,
    ]);

    return redirect()->route('aluno.solicitacoes.index')->with('success', 'Solicitação enviada com sucesso.');
}

public function index()
{
     $solicitacoes = Solicitacao::where('user_id', Auth::guard('aluno')->id())->get();
    //$solicitacoes = Solicitacao::where('user_id', Auth::id() )->get();
    return view('solicitacoes.index', compact('solicitacoes'));
}


public function adminIndex()
{
    // $solicitacoes = Solicitacao::with('user')->orderBy('created_at', 'desc')->get();
    $solicitacoes = Solicitacao::with('user')->latest()->get();
    return view('admin.solicitacoes.index', compact('solicitacoes'));
}

public function aprovar($id)
{
    $solicitacao = Solicitacao::findOrFail($id);
    $solicitacao->status = 'aprovada';
    $solicitacao->save();

    return redirect()->route('admin.solicitacoes.index')->with('success', 'Solicitação aprovada com sucesso.');
}

public function rejeitar($id)
{
    $solicitacao = Solicitacao::findOrFail($id);
    $solicitacao->status = 'rejeitada';
    $solicitacao->save();

    return redirect()->route('admin.solicitacoes.index')->with('success', 'Solicitação rejeitada com sucesso.');
}


}
