<div class="mb-2">
    <button class="btn btn-primary" type="submit">Salvar</button>

    <a href="{{route('products.index')}}" class="btn btn-primary">Voltar</a>
</div>

<div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" name="name" value="{{$product->name ?? old('name')}}" placeholder="Nome:" id="name">
</div>
@if($errors->has('name'))
    <div class="alert alert-danger" role="alert">
        {{$errors->first('name')}}
    </div>
@endif

<div class="mb-3">
    <label for="price" class="form-label">Preço</label>
    <input type="text" class="form-control" name="price" value="{{$product->price ?? old('price')}}" placeholder="Preço:" id="price">
</div>
@if($errors->has('price'))
    <div class="alert alert-danger" role="alert">
        {{$errors->first('price')}}
    </div>
@endif

<div class="mb-3">
    <label for="description" class="form-label">Descrição</label>
    <input type="text" class="form-control" name="description" value="{{$product->description ?? old('description')}}" placeholder="Descrição:" id="description">
</div>
@if($errors->has('description'))
    <div class="alert alert-danger" role="alert">
        {{$errors->first('description')}}
    </div>
@endif

<div class="mb-3">
    <label for="image">Imagem</label>
    <input type="file" class="form-control" name="image">
</div>
