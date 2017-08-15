<style>

</style>
<div class="container-fluid footer" style="background-color: #d1cece; height: 150px;">
  <div class="text-center" style="padding: 12px; font-size:15px">
    <a href="#"><b>Home</b></a> \ <a href="properties.php"><b>Properties</b></a> \ <a href="contact.php?contact"><b>Contact</b></a> \ <a href="form.php?swo=true"><b>Work Order</b></a>
    <p>1514 Main st.</p>
    <p>Niagara Falls, NY 14305</p>
    <p>(716) 284-7368</p>
    <p>RPM1514@yahoo.com</p>
    <?php
      if(isset($_SESSION['id'])){
        echo '<a href="php/forms/logout.php"><b>Logout</b></a>';
      } else {
        echo '<a href="form.php?login=true"><b>Login</b></a>';
      }
     ?>

  </div>
</div>
