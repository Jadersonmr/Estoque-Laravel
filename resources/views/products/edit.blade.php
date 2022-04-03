@extends('layouts.app')

@section('title', 'Criar produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Editar produto
            @endslot

            {!! Form::open(['url' => route('products.update', $product->id), 'method' => 'post', 'files' => true]) !!}
                @include('products.fields')
            {!! Form::close() !!}
        @endcomponent
    </div>
@endsection
