<?php
$prop = $_SESSION['propertylist'][$_GET['property']];
$address = $prop->v('address');
$city = $prop->v('city');
$zip = $prop->v('zip');
$search = $address . " " . $city ." ". $zip;
?>

<div class="widget card" style="text-align: center; height: 300px;">
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
