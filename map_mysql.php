<!DOCTYPE html>
<html>
    <head>
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <script>

            function initMap() {
                var mapOptions = {
                    center: {lat: 13.847860, lng: 100.604274},
                    zoom: 10,
                }
                var maps = new google.maps.Map(document.getElementById("map"), mapOptions);
                var marker, info;
                $.getJSON("jsondata.php", function (jsonObj) {
                    $.each(jsonObj, function (i, item) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(item.lat, item.lng),
                            map: maps,
                        });
                        info = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                info.setContent(item.name);
                                info.open(maps, marker);
                            }
                        })(marker, i));
                    });
                });
            }

        </script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8CDmDBO8DIC8AsAD0fffcIjWiaKdYvb4&callback=initMap"
        async defer></script>
    </body>
</html>