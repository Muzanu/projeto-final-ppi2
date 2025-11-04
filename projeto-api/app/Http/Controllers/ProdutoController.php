<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // 🟢 LISTAR TODOS (GET /api/produtos)
    public function index()
    {
        return response()->json(Produto::all(), 200);
    }

    // 🟢 CRIAR (POST /api/produtos)
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
        ]);

        $produto = Produto::create($dados);

        return response()->json($produto, 201);
    }

    // 🟢 EXIBIR UM (GET /api/produtos/{id})
    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['erro' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto, 200);
    }

    // 🟢 ATUALIZAR (PUT /api/produtos/{id})
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['erro' => 'Produto não encontrado'], 404);
        }

        $dados = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'sometimes|required|numeric',
            'estoque' => 'sometimes|required|integer',
        ]);

        $produto->update($dados);

        return response()->json($produto, 200);
    }

    // 🟢 DELETAR (DELETE /api/produtos/{id})
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['erro' => 'Produto não encontrado'], 404);
        }

        $produto->delete();

        return response()->json(['mensagem' => 'Produto excluído com sucesso'], 200);
    }
}
