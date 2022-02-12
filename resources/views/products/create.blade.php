@extends('layouts.app')

@section('title', 'Criar produtos - ')

@section('content')
    <h1>Cadastrar novo produto</h1>

    <form action="{{route('products.store')}}" method="post">
        @csrf
        @include('products.fields')
    </form>
@endsection
