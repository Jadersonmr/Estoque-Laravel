@extends('layouts.app')

@section('title', 'Produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Produtos
            @endslot
            <div>
                <a class="btn btn-primary mb-3" href="{{route('products.create')}}">Cadastrar produto</a>
                @include('products.table')
            </div>
        @endcomponent
        <div class="mt-2">
            {!! $products->links() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        console.log('teste');
    </script>
@endpush
