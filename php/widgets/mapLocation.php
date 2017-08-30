<div class="widget card" style="text-align: center; max-height: 350px;">
  <?php
  $search;
  if(isset($_GET['property'])){
    $prop = $_SESSION['propertylist'][$_GET['property']];
    $address = $prop->v('address');
    $city = $prop->v('city');
    $zip = $prop->v('zip');
    $search = $address . " " . $city ." ". $zip;
    $directionLink = str_replace(" ", "+", $address) . "+,"
                   . str_replace(" ", "+", $city) ."+,".
                     $zip;
    echo '
    <a target="_blank" style="text-decoration: none"href="https://www.google.com/maps/place/'.$directionLink.'"><h2 class="text-center" style="font-size: 20px; margin: 2px;"><small style="color: white; ">Link To Directions</small></h2></a>';
  } else {
    $search = '1514 Main st. Niagara Falls NY';
    echo '<h2 class="text-center" style="font-size: 20px; margin: 2px;"><small style="color: white; ">Our Location</small></h2>';
  }
  ?>
<div id="map" style="width:100%;height: 300px"></div>
</div>


<script>
var add = "<?php echo $search; ?>";
function myMap() {
  latLang = new google.maps.LatLng(0, 0);
  geocode = new google.maps.Geocoder();
    var mapOptions = {
        center: latLang,
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

geocode.geocode(
  {address: add},
  function(results, status){
    if(status == google.maps.GeocoderStatus.OK){
       var map = new google.maps.Map(document.getElementById("map"), mapOptions);
       map.setCenter(results[0].geometry.location);
       var marker = new google.maps.Marker({position: results[0].geometry.location, visible: true});
       marker.setMap(map);
    }
  }
);

}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBnogbdj3fKM0fKjGLxkfrnjOSrNCVib8&callback=myMap"></script>
