<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>


<div class="container-fluid head" >
  <div class="row">
    <!--Logo-->
    <div class="col-xs-7 col-sm-9">
      <img src="images/TEMPLOGO.jpg" class="img-fluid logo" alt="Logo">
    </div>
    <!--Contact Info-->
    <div class="col-xs-5 col-sm-3 contact-info">
      <p>123 Temp Ave.</p>
      <p>1234-123-1234</p>
      <p>temp@temp.temp</p>
    </div>
  </div>

  <!--Nav Bar-->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="properties.php">Properties</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <script type="text/javascript">
          $(function () {
              $("#1 a:contains('Home')").parent().addClass('active');
              $("#2 a:contains('Properties')").parent().addClass('active');
              $("#3 a:contains('Contact')").parent().addClass('active');
              $("#4 a:contains('About')").parent().addClass('active');
          });
      </script>
    </div>
  </nav>
</div>


</body>
</html>
