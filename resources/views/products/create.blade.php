@extends('layouts.app')

@section('title', 'Criar produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Cadastrar novo produto
            @endslot

        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('products.fields')
        </form>
        @endcomponent
    </div>
@endsection
