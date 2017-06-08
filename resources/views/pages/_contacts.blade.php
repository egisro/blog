@extends('layouts.master')

@section('content')


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
            <script>
                function initMap() {
                    var uluru = {lat: 20.742617, lng: -105.423185};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 17,
                        center: uluru,
                        row: 700
                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDzx0g5PYPq-KUVV2HqxV_b3euc6ACqh8&callback=initMap">
            </script>

            <script>
                (function () {
                    $('.toggle-button').on('click', function (event) {
                        if (event.currentTarget.id == 'edit-button') {
                            document.querySelector('#contact_desc_admin').classList.add('hidden');
                            document.querySelector('#contact_desc_user').classList.remove('hidden');
                        } else {
                            document.querySelector('#contact_desc_admin').classList.remove('hidden');
                            document.querySelector('#contact_desc_user').classList.add('hidden');
                        }
                    });
                })();
            </script>

        </div>
    </div>


@stop