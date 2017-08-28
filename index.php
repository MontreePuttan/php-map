<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
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
      var map;
      var position={lat: 13.847860, lng: 100.604274}
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 15,
          mapTypeId:google.maps.MapTypeId.TERRAIN
        });
        var marker = new google.maps.Marker({
            position: position,
            map:map,
        });
        var info = new google.maps.InfoWindow({
            content:'<div style="font-size:15px;">Montree Puttan</div>'
        });
        google.maps.event.addListener(marker,'click',function(){
           info.open(map,marker); 
        });
      }
    </script>
    <?php
        /*
         * ** Map Type
         * ** pattern = mapTypeId:google.maps.MapTypeId.HYBRID
         * ROADMAP แสดงถนนปกติ เป็นค่า Default แบบ 2D 
         * SATELLITE ภาพจากดาวเทียม
         * HYBRID แบบปกติผสมกับดาวเทียม
         * TERRAIN แบบภาพภูมิภูิศาสตรา์
         */
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8CDmDBO8DIC8AsAD0fffcIjWiaKdYvb4&callback=initMap"
    async defer></script>
  </body>
</html>