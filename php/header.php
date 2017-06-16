<!DOCTYPE html>
<html>
  <head>
    <style media="screen">
      p {
        margin: 0;
      }
    </style>
  </head>
  <body>

    <div class="headContent">
<div class="container-fluid head" >
  <div class="row">
    <!--Logo-->
    <div class="col-xs-7 col-sm-9">
      <a href="index.php" ><img src="images/LOGO_A.png" class="img-fluid logo" alt="Logo"></a>
    </div>
    <!--Contact Info-->
    <div class="col-xs-5 col-sm-3 contact-info">
      <p>123 Temp Ave.</p>
      <p>City city</p>
      <p>1234-123-1234</p>
      <p>temp@temp.temp</p>
    </div>
  </div>

  <!--Nav Bar-->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="properties.php">Properties</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>

      </div>
      <script type="text/javascript">
          $(function () {
              $("#1 a:contains('Home')").parent().addClass('active');
              $("#2 a:contains('Properties')").parent().addClass('active');
              $("#3 a:contains('About')").parent().addClass('active');
              $("#4 a:contains('Contact')").parent().addClass('active');
          });
      </script>
    </div>
  </nav>
</div>

    </div>


</body>
</html>
