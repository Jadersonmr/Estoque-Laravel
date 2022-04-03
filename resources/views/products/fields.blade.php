<div class="mb-2">
    {!! Form::submit("Salvar", ["class" => "btn btn-primary"]); !!}

    <a href="{{route('products.index')}}" class="btn btn-primary">Voltar</a>
</div>

<div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    {!! Form::text('name', $product->name ?? null , ["class" => "form-control", "placeholder" => "Nome:"]) !!}
</div>
@if($errors->has('name'))
    <div class="alert alert-danger" role="alert">
        {{$errors->first('name')}}
    </div>
@endif

<div class="mb-3">
    <label for="price" class="form-label">Preço</label>
    {!! Form::number('price', $product->price ?? null , ["class" => "form-control", "placeholder" => "Preço:"]) !!}
</div>
@if($errors->has('price'))
    <div class="alert alert-danger" role="alert">
        {{$errors->first('price')}}
    </div>
@endif

<div class="mb-3">
    <label for="description" class="form-label">Descrição</label>
    {!! Form::textarea('description', $product->description ?? null , ["class" => "form-control", "placeholder" => "Descrição:"]) !!}
</div>
@if($errors->has('description'))
    <div class="alert alert-danger" role="alert">
        {{$errors->first('description')}}
    </div>
@endif

<div class="mb-3">
    <label for="image">Imagem</label>
    {!! Form::file('image', ["class" => "form-control"]); !!}
</div>
