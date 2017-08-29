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
      var maps;
      var position={lat: 13.847860, lng: 100.604274};
      var locations = [
          ['Home01',13.846876,100.604481],
          ['Home02',13.847766,100.605768],
          ['Home03',13.845235,100.602711],
          ['Home04',13.862970,100.613834]
      ];
      
      function initMap() {
        maps = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 15,
          mapTypeId:google.maps.MapTypeId.TERRAIN
        });
        var marker = new google.maps.Marker({
            position: position,
            map:maps,
        });
        var info = new google.maps.InfoWindow({
            content:'<div style="font-size:15px;">Montree Puttan</div>'
        });
        google.maps.event.addListener(marker,'click',function(){
           info.open(map,marker); 
        });
        
        var marker,i,info;
        for(i=0;i<locations.length;i++){
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1],locations[i][2]),
                map:maps,
                icon:"images/icon-marker.png"
            });
            info = new google.maps.InfoWindow();
            google.maps.event.addListener(marker,'click',(function(marker,i){
               return function(){
                   info.setContent(locations[i][0]);
                   info.open(maps,marker);
               } 
            })(marker,i));
        }
      }
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8CDmDBO8DIC8AsAD0fffcIjWiaKdYvb4&callback=initMap"
    async defer></script>
  </body>
</html>