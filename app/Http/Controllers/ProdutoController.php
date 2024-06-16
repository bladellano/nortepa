<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'resumo' => 'required',
            'descricao_completa' => 'required',
            'imagem' => 'nullable|image',
            'categoria' => 'required|in:maquina,ferramenta',
            'estado' => 'required|in:novo,usado',
        ]);

        $produto = new Produto($request->all());

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('public/produtos');
            $produto->imagem = $path;
        }

        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto adicionado com sucesso!');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'resumo' => 'required',
            'descricao_completa' => 'required',
            'imagem' => 'nullable|image',
            'categoria' => 'required|in:maquina,ferramenta',
            'estado' => 'required|in:novo,usado',
        ]);

        $produto->fill($request->all());

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('public/imagens');
            $produto->imagem = $path;
        }

        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
