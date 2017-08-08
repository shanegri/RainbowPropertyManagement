<?php

function redirect($var){
  echo '
  <script>
  window.location.replace("'.$var.'");
  </script>
  ';
}


?>
