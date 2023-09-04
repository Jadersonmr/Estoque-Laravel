<table class="table table-bordered">
    <thead>
    <tr>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>
                @if($product->image)
                    <img src="{{url("storage/{$product->image}")}}" alt="{{$product->name}}" style="max-width: 50px; max-height: 50px;">
                @endif
            </td>
            <td>{{$product->name ?? null}}</td>
            <td>{{$product->price ?? null}}</td>
            <td>{{$product->description ?? null}}</td>
            <td class="text-center">{{$product->stock->quantity ?? 0}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('stock.create', $product->id)}}">+</a>
            </td>
            <td>
                <a class="btn btn-primary" href="{{route('stock.output', $product->id)}}">-</a>
            </td>
            <td>
                <a class="btn btn-primary" href="{{route('products.show', $product->id)}}">Detalhes</a>
            </td>
            <td>
                <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">Editar</a>
            </td>
            <td>
                <form id="form-product-{{$product->id}}" action="{{route('products.destroy', $product->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" data-delete-product="{{$product->id}}" class="btn btn-primary deleteProduct" data-toggle="modal" data-target="#deleteModal">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
