@extends('layouts.app')

@section('title', 'Produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Produtos
            @endslot
            <div>
                <form action="{{route('products.search')}}" method="post" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" placeholder="Buscar" class="form-control" value="{{$filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-info">Pesquisar</button>
                </form>
                <br>
                <a class="btn btn-primary mb-3" href="{{route('products.create')}}">Cadastrar produto</a>
                @include('products.table')
            </div>
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
