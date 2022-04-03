@extends('layouts.app')

@section('title', 'Produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Produtos
            @endslot
                {!! Form::open(['url' => route('products.search'), 'method' => 'post', "class" => "form form-inline"]) !!}
                    {!! Form::text('filter', $filters['filter'] ?? null, ["class" => "form-control mr-2", "placeholder" => "Buscar:"]) !!}
                    {!! Form::submit("Pesquisar", ["class" => "btn btn-primary"]); !!}
                {!! Form::close() !!}
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
