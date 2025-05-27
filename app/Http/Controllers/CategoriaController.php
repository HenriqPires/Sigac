<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Curso;

class CategoriaController extends Controller
{
     public function index()
    {
        $categorias = Categoria::with('curso')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('categorias.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso.');
    }

    public function edit(Categoria $categoria)
    {
        $cursos = Curso::all();
        return view('categorias.edit', compact('categoria', 'cursos'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso.');
    }
}
