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
      
      var jsonObj = [
          {"location":"วัดเบญ","lat":"13.846876","long":"100.604481"},
          {"location":"บ้านตั๊กแตน","lat":"13.847766","long":"100.605768"},
          {"location":"มอเอตร์เวย์","lat":"13.845235","long":"100.602711"},
          {"location":"บ้านน้องแจ่ม","lat":"13.862970","long":"100.613834"}
      ];
      
      function initMap() {
        maps = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 10,
          mapTypeId:google.maps.MapTypeId.TERRAIN,
          
        });
        var marker,info;
        $.each(jsonObj,function(i,item){
            marker = new google.maps.Marker({
               position: new google.maps.LatLng(item.lat,item.long),
               map:maps
            });
            
            info = new google.maps.InfoWindow();
            google.maps.event.addListener(marker,'click',(function(marker,i){
                return function(){
                    info.setContent(item.location);
                    info.open(maps,marker);
                }
            })(marker,i));
        });
      }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8CDmDBO8DIC8AsAD0fffcIjWiaKdYvb4&callback=initMap"
    async defer></script>
  </body>
</html>