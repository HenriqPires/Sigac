<?php

namespace App\Http\Controllers;
use App\Models\Curso;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eixos = \App\Models\Eixo::all();
        $niveis = \App\Models\Nivel::all();
        return view('cursos.create', compact('eixos', 'niveis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'total_horas' => 'required|numeric',
            'eixo_id' => 'required|exists:eixos,id',
            'nivel_id' => 'required|exists:nivels,id',
        ]);


        Curso::create($request->all());
        
        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        $eixos = \App\Models\Eixo::all();
        $niveis = \App\Models\Nivel::all();
        return view('cursos.edit', compact('curso', 'eixos', 'niveis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $curso->update($request->all());
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso.');
    }
}
