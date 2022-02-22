@extends('layouts.app')

@section('title', 'Criar produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Editar produto
            @endslot

            <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('products.fields')
            </form>
        @endcomponent
    </div>
@endsection
