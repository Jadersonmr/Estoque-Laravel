@extends('layouts.app')

@section('title', 'Detalhes do produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Detalhes do produto
            @endslot
                <h4>{{$product->name}}</h4>
                <p>{{$product->description}}</p>
        @endcomponent
    </div>
@endsection
