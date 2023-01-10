@extends('layout.front.index')
@section('title', 'Feedback')

@section('content')
<!-- HEADING-BANNER START -->
<div class="heading-banner-area overlay-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Feedback</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Feedback</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- contact-us-AREA START -->
<div class="contact-us-area  pt-80 pb-80">
    <div class="container">
        <div class="contact-us customer-login bg-white">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="send-message mt-60">







                        <form id="contact-form" method="post" action="{{ route('feedback') }}" enctype="multipart/form-data">
                            @csrf
                      
                            <h4 class="title-1 title-border text-uppercase mb-30">Feedback</h4>

                            <input type="text" name="name" placeholder="Your name here..." required />
                            <input type="text" name="email" placeholder="Your email here..." required />
                            <input type="text" name="phone"  placeholder="Your phone here..." required />
                            <input type="textaria" class="custom-textarea" name="feedback" placeholder="Your feedback here..." required>
                            <input type="text" name="status" value="0"  placeholder="Your phone here..." required hidden />
                            {{-- <div class="text-center">
                                <input type="submit" class="btn btn-primary float-end" value="Add" />
                            </div> --}}
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                              @endif
                            <button onClick="window.location.reload();" class="button-one submit-button mt-20" data-text="submit message" type="submit">Send</button>
                    
                        </form>





                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 mt-xs-30">
                    <div class="content p-5">
                        <div class="img text-center"><img src="{{ asset('front-end-assets/img/logo/logo.png') }}" alt=""></div>
                        <div class="feedback mt-5">
                            <h4>
                                You can write to us any thing you want to say
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT-US-AREA END -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
<script>
    function initialize() {
        var mapOptions = {
            zoom: 10,
            scrollwheel: false,
            center: new google.maps.LatLng( 31.9539, 35.9106 ),
        };
        var map = new google.maps.Map(document.getElementById('googleMap'),
            mapOptions
        );
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            icon: ' ',
            map: map
        });
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            '<p>7th Circle -Ibn Mudaa ST. </br> </br>Amman, Jordan</p>'+
            '</div>'+
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
            infowindow.open(map, marker);

        var styles =
        [
            {
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#636363"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#1f1f1f"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#1F1F1F"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#1F1F1F"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#2A2A2A"
                    },
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#2A2A2A"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#2A2A2A"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#2A2A2A"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#1a1a1a"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#1a1a1a"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#1a1a1a"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#1F1F1F"
                    },
                ]
            }
        ];

        map.setOptions({styles: styles});
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection
