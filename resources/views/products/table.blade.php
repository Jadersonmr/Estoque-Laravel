<table>
    <thead>
    <th>
        <tr>Nome</tr>
        <tr>Descrição</tr>
    </th>
    </thead>
    <tbody>
    @foreach($products as $product)
        <th>
            <tr>{{$product->name ?? null}}</tr>
            <tr>{{$product->description ?? null}}</tr>
            <tr>
                <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">Editar produto</a>
                <form action="{{route('products.destroy', $product->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Excluir produto</button>
                </form>
            </tr>
        </th>
    @endforeach
    </tbody>
</table>
