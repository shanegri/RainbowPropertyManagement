

<div class="widget card" style="text-align: center; max-height: 350px;">
  <?php
  $search;
  if(isset($_GET['property'])){
    $prop = $_SESSION['propertylist'][$_GET['property']];
    $address = $prop->v('address');
    $city = $prop->v('city');
    $zip = $prop->v('zip');
    $search = $address . " " . $city ." ". $zip;
  } else {
    $search = '1514 Main st. Niagara Falls NY';
    echo '<h3 class="text-center" style="margin: 2px;"><small>Our Location</small></h3>';
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
