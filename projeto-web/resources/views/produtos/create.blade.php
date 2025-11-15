<h1>Novo Produto</h1>
<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    <label>Nome: <input type="text" name="nome"></label><br>
    <label>Descrição: <input type="text" name="descricao"></label><br>
    <label>Preço: <input type="number" step="0.01" name="preco"></label><br>
    <label>Estoque: <input type="number" name="estoque"></label><br>
    <button type="submit">Salvar</button>
</form>
