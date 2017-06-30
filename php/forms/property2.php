<div style="padding: 20px;">
<div class="container-fluid card propertyForm">
<form method="post">
<?php

$prop = Property2::init();
$prop->showInput('description');

?>
<br>
<button type="submit" value="submit">Submit</button>
</form>
  
</div>
</div>
