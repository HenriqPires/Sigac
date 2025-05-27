<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eixo;

class EixoController extends Controller
{
    public function index()
    {
        $eixos = Eixo::all();
        return view('eixos.index', compact('eixos'));
    }

    public function create()
    {
        return view('eixos.create');
    }

    public function store(Request $request)
    {
        Eixo::create($request->all());
        return redirect()->route('eixos.index')->with('success', 'Eixo criado com sucesso.');
    }

    public function edit(Eixo $eixo)
    {
        return view('eixos.edit', compact('eixo'));
    }

    public function update(Request $request, Eixo $eixo)
    {
        $eixo->update($request->all());
        return redirect()->route('eixos.index')->with('success', 'Eixo atualizado com sucesso.');
    }

    public function destroy(Eixo $eixo)
    {
        $eixo->delete();
        return redirect()->route('eixos.index')->with('success', 'Eixo excluído com sucesso.');
    }
}
