@extends('layouts.app')

@section('title', 'Produtos - ')

@section('content')
    <div class="content">
        @component('products.components.card')
            @slot('title')
                Produtos
            @endslot
                @include('products.table')
                <a class="btn btn-primary" href="{{route('products.create')}}">Cadastrar produto</a>
        @endcomponent
    </div>
@endsection

@push('scripts')
    <script>
        console.log('teste');
    </script>
@endpush
