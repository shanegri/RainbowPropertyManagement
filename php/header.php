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
<div class="container-fluid" >
  <div class="row" >
    <!--Logo-->
    <div class="col-xs-7 col-sm-9">
      <a href="index.php" ><img src="Images/LOGO_D.png" class="img-fluid logo" alt="Logo"></a>
    </div>
    <!--Contact Info-->
    <div class="col-xs-5 col-sm-3">
      <div class="container-fluid  contact-info">
        <p>123 Temp Ave.</p>
        <p>City city</p>
        <p>1234-123-1234</p>
        <p>temp@temp.temp</p>
      </div>
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
        <li><a href="properties.php?page=0">Properties</a></li>
        <li><a href="about.php">About</a></li>
        <li class="dropdown">
        <a class="dropdown-toogle" data-toggle="dropdown"> Contact<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="contact.php?contact" >Contact</a></li>
          <li><a href="form.php?swo=true" >Work Order</a></li>
          <li><a href="form.php?apply" >Apply to Rent</a></li>
        </ul>
        </li>
        <?php
        if(isset($_SESSION['id'])){
          echo '<li><a href="form.php?log=true">Logs</a></li>';
          echo '<li><a href="php/forms/logout.php">Log Out</a></li>';
        }
         ?>
      </ul>

      </div>
      <script type="text/javascript">
          $(function () {
              $("#1 a:contains('Home')").parent().addClass('active');
              $("#2 a:contains('Properties')").parent().addClass('active');
              $("#3 a:contains('About')").parent().addClass('active');
              $("#4 a:contains('Contact')").parent().addClass('active');
              $("#4 a:contains(' Contact')").parent().addClass('active');
              $("#6 a:contains(' Contact')").parent().addClass('active');
              $("#6 a:contains('Work Order')").parent().addClass('active');
              $("#7 a:contains(' Contact')").parent().addClass('active');
              $("#7 a:contains('Apply to Rent')").parent().addClass('active');
              $("#5 a:contains('Logs')").parent().addClass('active');
          });
      </script>
    </div>
  </nav>
</div>
</div>


</body>
</html>
