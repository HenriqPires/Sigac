<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel;

class NivelController extends Controller
{
    
    public function index()
    {
        $nivels = Nivel::all();
        return view('nivels.index', compact('nivels'));
    }

    public function create()
    {
         return view('nivels.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Nivel::create($request->all());

        return redirect()->route('nivels.index')->with('success', 'Nível criado com sucesso.');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(Nivel $nivel)
    {
        return view('nivels.edit', compact('nivel'));
    }

    public function update(Request $request, Nivel $nivel)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $nivel->update($request->all());

        return redirect()->route('nivels.index')->with('success', 'Nível atualizado com sucesso.');
    }

    
    public function destroy(Nivel $nivel)
    {
         $nivel->delete();
        return redirect()->route('nivels.index')->with('success', 'Nível excluído com sucesso.');
    }
}
