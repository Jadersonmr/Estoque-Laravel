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
                <a class="btn btn-primary mb-3 mt-2 mr-1 float-right" href="{{route('products.create')}}">Cadastrar produto</a>
            @if($products->count() == 0)
                <div class="mt-2">
                    <span>Não foram encontrados produtos</span>
                </div>
            @else
                @include('products.table')
            @endif
        @endcomponent
        <div class="mt-2">
            {!! $products->appends($filters ?? null)->links() !!}
        </div>
    </div>
@endsection
@include('components.delete-modal')
@push('scripts')
    <script>
        $('.deleteProduct').on('click', function () {
            $('#deleteModalButton').attr('data-product', $(this).data('delete-product'));
        });

        $('#deleteModalButton').on('click', function () {
            $('#form-product-' + $(this).data('product')).submit();
        })
    </script>
@endpush
