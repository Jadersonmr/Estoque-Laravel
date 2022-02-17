<div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" name="name" value="{{$product->name ?? null}}" placeholder="Nome:" id="name">
    @if($errors->has('name'))
        <span class="alert-danger">
            {{$errors->first('name')}}
        </span>
    @endif
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descrição</label>
    <input type="text" class="form-control" name="description" value="{{$product->description ?? null}}" placeholder="Descrição:" id="description">
    @if($errors->has('description'))
        <span class="alert-danger">
            {{$errors->first('description')}}
        </span>
    @endif
</div>
<div class="mb-3">
    <label for="image">Imagem</label>
    <input type="file" class="form-control" name="image">
</div>
<button class="btn btn-primary" type="submit">Enviar</button>
