<h1>Editar Produto</h1>
<form action="{{ route('produtos.update', $produto['id']) }}" method="POST">
    @csrf @method('PUT')
    <label>Nome: <input type="text" name="nome" value="{{ $produto['nome'] }}"></label><br>
    <label>Descrição: <input type="text" name="descricao" value="{{ $produto['descricao'] }}"></label><br>
    <label>Preço: <input type="number" step="0.01" name="preco" value="{{ $produto['preco'] }}"></label><br>
    <label>Estoque: <input type="number" name="estoque" value="{{ $produto['estoque'] }}"></label><br>
    <button type="submit">Atualizar</button>
</form>

