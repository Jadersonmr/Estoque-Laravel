<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->name ?? null}}</td>
            <td>{{$product->description ?? null}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('products.show', $product->id)}}">Detalhes</a>
            </td>
            <td>
                <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">Editar</a>
            </td>
            <td>
                <form action="{{route('products.destroy', $product->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
