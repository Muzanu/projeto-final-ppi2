<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <a href="{{ route('produtos.create') }}">Novo Produto</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th><th>Nome</th><th>Preço</th><th>Estoque</th><th>Ações</th>
        </tr>
        @foreach ($produtos as $p)
        <tr>
            <td>{{ $p['id'] }}</td>
            <td>{{ $p['nome'] }}</td>
            <td>R$ {{ number_format($p['preco'], 2, ',', '.') }}</td>
            <td>{{ $p['estoque'] }}</td>
            <td>
                <a href="{{ route('produtos.edit', $p['id']) }}">Editar</a>
                <form action="{{ route('produtos.destroy', $p['id']) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
