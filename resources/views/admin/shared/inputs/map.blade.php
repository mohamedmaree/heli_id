
<script type="text/javascript" src='https://maps.google.com/maps/api/js?language={{app()->getLocale()}}&libraries=places&key=AIzaSyA9_ve_oT3ynCaAF8Ji4oBuDjOhWEHE92U'></script>
<script>
    var map;
    var marker;
    var lat = document.getElementById('lat');
    var lng = document.getElementById('lng');
    var address = document.getElementById('address')
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();

    function initMap(latLng){
        var myLatlng ;
        if(lat.value === '' || lng.value === ''){
            myLatlng = latLng;
        }else{
            myLatlng = new google.maps.LatLng(lat.value, lng.value)
        }
        var mapOptions = {
            zoom: 10,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: !!({{$draggable?'true':'false'}})
        });


        geocoder.geocode({'latLng': myLatlng }, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    address.value = results[0].formatted_address;
                    lat.value = marker.getPosition().lat();
                    lng.value = marker.getPosition().lng();
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            }
        });

        google.maps.event.addListener(marker, 'dragend', function() {

            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        address.value = results[0].formatted_address;
                        lat.value = marker.getPosition().lat();
                        lng.value = marker.getPosition().lng();
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });

    }


    function initialize()
    {
        var input = document.getElementById('mapSearch');
        var autocomplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */(input),
            {
                types: ['(cities)'],
            });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            lat.value = place.geometry.location.lat();
            lng.value = place.geometry.location.lng();
            // initMap();
            var address = '';
            if (place.address_components)
            {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            initMap();


        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);

    // if(lat.value !== '' && lng.value !== ''){
    google.maps.event.addDomListener(window, 'load', initMap);
    // }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (p) {
            var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
            initMap(LatLng)
        });
    } else {
        alert('Geo Location feature is not supported in this browser.');
    }




</script>
