@extends('layouts.app')

@section('title', 'Produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Produtos
            @endslot
                <form action="{{route('products.search')}}" method="post" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" placeholder="Buscar" class="form-control mr-2" value="{{$filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </form>
                <a class="btn btn-primary mb-3 mt-2 float-right" href="{{route('products.create')}}">Cadastrar produto</a>
            @include('products.table')
        @endcomponent
        <div class="mt-2">
            {!! $products->appends($filters ?? null)->links() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        console.log('teste');
    </script>
@endpush
