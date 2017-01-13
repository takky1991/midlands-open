@extends('layouts.mma')

@section('container')
    <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
    <div class="mma-location-page">
        <div class="row">
            <div class="col-md-4">
                <h3>Address:</h3>
                <p>Unit 1</p>
                <p>Riverside Commercial Park</p>
                <p>Edenderry Road</p>
                <p>Portarlington, Co. Laois</p> 
            </div>
            <div class="col-md-8">
                <div id="map"></div>
            </div>
        </div>
      
    </div>

    <script>
        function initMap() {
            var uluru = {lat: 53.1665281, lng: -7.1875048};
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: uluru
            });
            var marker = new google.maps.Marker({
            position: uluru,
            map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEcocn6uNNGaYQckz0-uIxacQL7hymNbI&callback=initMap"></script>
@endsection