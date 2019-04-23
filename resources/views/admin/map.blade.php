<!DOCTYPE html>
<html>
<head>
    <title>موقعیت مکانی</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" /> <!-- original: http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css -->
    <style>
        html, body, #container, #map {
            padding: 0;
            margin: 0;
        }
        html, body, #map, #container {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
<form>
    <input id="latitude" type="text" style="display: none"/>
    <input id="longitude" type="text" style="display: none"/>
</form>
<div id="map"></div>
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> <!-- Orginal: http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js -->
<script>
    var tileLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> Contributors'
    });

    //remember last position
    var rememberLat = document.getElementById('latitude').value;
    var rememberLong = document.getElementById('longitude').value;
    if( !rememberLat || !rememberLong ) { rememberLat = @if(isset($o->lat)) {{$o->lat}} @endif;
    rememberLong = @if(isset($o->lat)) {{$o->lon}} @endif;}

    var map = new L.Map('map', {
        'center': [rememberLat, rememberLong],
        'zoom': 16,
        'layers': [tileLayer]
    });

    var marker = L.marker([rememberLat, rememberLong],{
        draggable: true
    }).addTo(map);

    marker.on('dragend', function (e) {
        updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
    });

    map.on('click', function (e) {
        marker.setLatLng(e.latlng);
        updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
    });

    function updateLatLng(lat,lng,reverse) {
        if(reverse) {
            marker.setLatLng([lat,lng]);
            map.panTo([lat,lng]);
        } else {
            document.getElementById('latitude').value = marker.getLatLng().lat;
            document.getElementById('longitude').value = marker.getLatLng().lng;
            map.panTo([lat,lng]);
        }
    }

</script>
</body>
</html>
