<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoWebController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_URL') . '/produtos';
    }

    // 🟢 LISTAR PRODUTOS
    public function index()
    {
        


        $response = Http::get($this->apiUrl);
        $produtos = $response->json();

        return view('produtos.index', compact('produtos'));
    }

    // 🟢 FORMULÁRIO DE CRIAÇÃO
    public function create()
    {
        return view('produtos.create');
    }

    // 🟢 SALVAR NOVO PRODUTO
    public function store(Request $request)
    {
        Http::post($this->apiUrl, $request->all());
        return redirect()->route('produtos.index');
    }

    // 🟢 FORMULÁRIO DE EDIÇÃO
    public function edit($id)
    {
        $response = Http::get($this->apiUrl . '/' . $id);
        $produto = $response->json();

        return view('produtos.edit', compact('produto'));
    }

    // 🟢 ATUALIZAR PRODUTO
    public function update(Request $request, $id)
    {
        Http::put($this->apiUrl . '/' . $id, $request->all());
        return redirect()->route('produtos.index');
    }

    // 🟢 EXCLUIR PRODUTO
    public function destroy($id)
    {
        Http::delete($this->apiUrl . '/' . $id);
        return redirect()->route('produtos.index');
    }
}
