<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
     public function index()
    {
        $documentos = Documento::with('categoria')
            ->where('user_id', Auth::id())
            ->get();

        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('documentos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string|max:255',
            'horas_in' => 'required|numeric|min:0.5',
            'arquivo' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $request->file('arquivo')->store('documentos', 'public');

        Documento::create([
            'categoria_id' => $request->categoria_id,
            'descricao' => $request->descricao,
            'horas_in' => $request->horas_in,
            'url' => $path,
            'status' => 'pendente',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('documentos.index')->with('success', 'Solicitação enviada com sucesso!');
    }
}
