@extends('layouts.master')

@section('content')

    <style>
        #map { height: 600px; border: 1px solid #ccd0d2 }

    </style>
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Us</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <p class="lead" style="text-align: justify">Call our 24 Hour Customer Feedback Hotline:
                8600 (55221)
                 
            <p class="lead">Working hours:</p>
               <p class="lead">I-VI: 11:00 - 23:00
                VII: 11-20:00</p>

            <p class="lead">Address:</p>
            <p class="lead">Šeimyniškių g. 3, LT-08221, Vilnius
            </p>
        </div>

        <div class="col-md-12">
            <div id="map"></div>

            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <script>

                function init_map() {
                    var var_location = new google.maps.LatLng(54.694358, 25.283641);

                    var var_mapoptions = {
                        center: var_location,
                        zoom: 14
                    };

                    var var_marker = new google.maps.Marker({
                        position: var_location,
                        map: var_map,
                        title:"Venice"});

                    var var_map = new google.maps.Map(document.getElementById("map"),
                        var_mapoptions);

                    var_marker.setMap(var_map);

                }

                google.maps.event.addDomListener(window, 'load', init_map);

            </script>

        </div>
    </div>


@stop