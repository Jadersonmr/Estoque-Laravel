@extends('layouts.app')

@section('title', 'Criar produtos - ')

@section('content')
    <div class="container">
        @component('products.components.card')
            @slot('title')
                Cadastrar novo produto
            @endslot

        {!! Form::open(['url' => route('products.store'), 'method' => 'post', 'files' => true]) !!}
            @include('products.fields')
        {!! Form::close() !!}
        @endcomponent
    </div>
@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
    <script>
        function success(pos){
            console.log(pos.coords.latitude, pos.coords.longitude);
        }

        navigator.geolocation.getCurrentPosition(success);

        var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }),
            Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            }),
            Google = L.gridLayer.googleMutant({
                type: "roadmap", // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
            });

        var map = L.map('map', {
            layers: [OpenStreetMap_Mapnik, Esri_WorldImagery, Google]
        }).setView([-28.48602022180912, -49.00743484497071], 15);

        var baseMaps = {
            "Satelite": Esri_WorldImagery,
            "Google": Google,
            "Open street map": OpenStreetMap_Mapnik
        };

        var layerControl = L.control.layers(baseMaps).addTo(map);

        map.on('click', function (e){
            console.log(e.latlng);
            L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
        });

        var latlngs = [
            [-28.48602022180912, -49.00743484497071],
            [-28.487032461384967, -49.01259541511536],
            [-28.484429792603454, -49.013303518295295]
        ];

        var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

        map.fitBounds(polyline.getBounds());
    </script>
@endpush
