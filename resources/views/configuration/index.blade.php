@extends('layouts.app')

@section('title', 'Configuração - ')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Configurações
            </div>
            <div class="card-body">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
    <script src="{{asset('js/leaflet.rotatedMarker.js')}}"></script>
    <script src="{{asset('js/leaflet-polylinedecorator/dist/leaflet.polylineDecorator.js')}}"></script>
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
            layers: [OpenStreetMap_Mapnik]
        }).setView([-28.48602022180912, -49.00743484497071], 15);

        var baseMaps = {
            "Open street map": OpenStreetMap_Mapnik,
            "Satelite": Esri_WorldImagery,
            "Google": Google
        };

        var layerControl = L.control.layers(baseMaps).addTo(map);

        map.on('click', function (e){
            L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
        });

        var latlngs = [
            [-28.485735960500328, -49.00723502039911],
            [-28.486998204527396, -49.01257663965225],
            [-28.483834443732164, -49.01355832815171],
            [-28.483171606743493, -49.011045098304756],
            [-28.48292642157263, -49.0094143152237],
            [-28.48230402588984, -49.00775134563446],
            [-28.480446247264034, -49.00922119617463],
            [-28.478635588933496, -49.01060521602631]
        ];

        var directionIcon = L.icon({
            iconUrl: "{{asset('images/a_up_arrow_icon.svg')}}",
            iconSize:     [38, 95], // size of the icon
            iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
        });

        var startIcon = L.icon({
            iconUrl: "{{asset('images/maker_map_flag_location_icon.svg')}}",
            iconSize:     [38, 95], // size of the icon
            iconAnchor:   [22, 60], // point of the icon which will correspond to marker's location
        });

        var endIcon = L.icon({
            iconUrl: "{{asset('images/flag_finish_goal_icon.svg')}}",
            iconSize:     [38, 95], // size of the icon
            iconAnchor:   [15, 60], // point of the icon which will correspond to marker's location
        });

        for(let index = 0; index < latlngs.length; index++) {
            let angle;

            if(typeof latlngs[index+1] !== "undefined") {
                angle = getAngle(latlngs[index], latlngs[index + 1], -2);
            }

            if(index === 0){
                L.marker(latlngs[index], {icon: startIcon}).addTo(map);
            }else if(index+1 === latlngs.length){
                L.marker(latlngs[index], {icon: endIcon}).addTo(map);
            }else {
                L.marker(latlngs[index], {icon: directionIcon, rotationAngle: angle}).addTo(map);
            }
        }

        var polyline = L.polyline(latlngs, {
                                                color: 'green',
                                                weight: 8,
                                                opacity: .7,
                                            }).addTo(map);

        map.fitBounds(polyline.getBounds());

        function getAngle(latLng1, latlng2, coef) {
            var dy = latlng2[0] - latLng1[0];
            var dx = Math.cos(Math.PI / 180 * latLng1[0]) * (latlng2[1] - latLng1[1]);
            var ang = ((Math.atan2(dy, dx) / Math.PI) * 180 * coef);
            return (ang).toFixed(2);
        }

        var decorator = L.polylineDecorator(polyline, {
            patterns: [
                {offset: 0, repeat: 40, symbol: L.Symbol.arrowHead({pixelSize: 30})}
            ]
        }).addTo(map);
    </script>
@endpush
