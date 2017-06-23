<?php
function printList($arIndex, $address, $description, $cost){
  $im = './images/TEMPICON2.jpg';
  echo '
<div class="propertyPreview card">
  <div class="container-fluid" style=" margin: auto 0; margin-top: 15px;">
    <div class="row">
      <div class="col-sm-6 propPrevCrop" style="background-image: url('.$im.')">
      </div>
      <div class="col-sm-6">
        <h3 style="margin: 0;"><small><i>Description:</i></small></h3>
        <p>'.$description.'</p>
        <div>
          <h3 style="margin: 0; display: inline"><small><i>Address: </i></small></h3>
          <p style="display:inline">'.$address.'</p>
        </div>
        <div>
          <h3 style="margin: 0; display: inline"><small><i>Cost: $ </i></small></h3>
          <p style="display:inline">'.$cost.'</p>
        </div>
        <div>
          <h3 style="margin: 0; display: inline"><small><i>Type: </i></small></h3>
          <p style="display:inline">'.'For Rent'.'</p>
        </div>
        <div>
            <a href="../../properties.php?property='.$arIndex.'"><button>More Information</button></a>
            <button>Apply</button>
        </div>
    </div>
    </div>
  </div>
</div>

';

}

?>
