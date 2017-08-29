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
      #floating-panel{
          position: absolute;
          top: 10px;
          left: 25%;
          z-index: 5;
          background-color: #fff;
          padding: 5px;
          border: 1px solid #999;
          text-align: center;
          font-family: 'Roboto','san-serif';
          line-height: 30px;
      }
    </style>
  </head>
  <body>
      <div id="floating-panel">
          <input id="address" type="text" value="กรุงเทพมหานคร">
          <input id="submit" type="button" value="ค้นหาข้อมูล">
      </div>
    <div id="map"></div>
    <script>
      var maps;
      var position={lat: 13.847860, lng: 100.604274};
      function initMap() {
        maps = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 10,
          mapTypeId:google.maps.MapTypeId.TERRAIN
        });
        
        var geocoder = new google.maps.Geocoder();
        document.getElementById('submit').addEventListener('click',function(){
            geocodeAddress(geocoder,maps);
        });
      }
      function geocodeAddress(geocoder,resultsMap){
          var address = document.getElementById('address').value;
          geocoder.geocode({'address':address},function(results,status){
              if(status==='OK'){
                  resultsMap.setCenter(results[0].geometry.location);
                  var marker = new google.maps.Marker({
                      map:maps,
                      position:results[0].geometry.location
                  });
              } else {
                  alert('Geiocode was not successful for the follow reason : '+status);
              }
          });
      }
      
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8CDmDBO8DIC8AsAD0fffcIjWiaKdYvb4&callback=initMap"
    async defer></script>
  </body>
</html>