@extends('layouts.app')

@section('title', 'Adicionar entrada - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Adicionar entrada de produto
            @endslot

            {!! Form::open(['url' => route('stock.store'), 'method' => 'post', 'files' => true]) !!}
                <div class="mb-2">
                    <a href="{{route('products.index')}}" class="btn btn-primary">Voltar</a>
                    {!! Form::submit("Adicionar", ["class" => "btn btn-primary"]); !!}
                </div>
                <div class="row">
                    <div class="col-5">
                        <label for="quantity" class="form-label">Quantidade</label>
                        {!! Form::number('quantity', null , ["class" => "form-control", "placeholder" => "Quantidade:"]) !!}
                    </div>
                    @if($errors->has('quantity'))
                        <div class="alert alert-danger mt-4" role="alert">
                            {{$errors->first('quantity')}}
                        </div>
                    @endif
                </div>
                <input type="hidden" name="product_id" value="{{$productId}}">
                <input type="hidden" name="type" value="1">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            {!! Form::close() !!}
        @endcomponent
    </div>
@endsection
