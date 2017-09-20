


<div>
<div class="headContent">
<div class="container-fluid" >
  <div class="row" >
    <!--Logo-->
    <div class="col-xs-12 col-sm-9">
      <a href="index.php" ><img src="Images/RPM Logo.png" class="img-fluid logo" alt="Logo"></a>
    </div>
    <!--Contact Info-->
    <div class="hidden-xs col-sm-3">
      <div class="container-fluid  contact-info">
        <p>1514 Main st.</p>
        <p>Niagara Falls, NY 14305</p>
        <p>(716) 284-7368</p>
        <p>RPM1514@yahoo.com</p>
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
        <li><a href="index">Home</a></li>
        <li><a href="properties?page=0">Properties</a></li>
        <li><a href="about">About</a></li>
        <li class="dropdown">
        <a class="dropdown-toogle" data-toggle="dropdown"> Contact<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="contact?contact" >Contact</a></li>
          <li><a href="form?swo=true" >Work Order</a></li>
          <li><a href="form?apply&page=0" >Apply to Rent</a></li>
        </ul>
        </li>
        <?php
        if(isset($_SESSION['id'])){
          echo '<li><a href="form?log=true">Logs</a></li>';
          echo '<li><a href="php/forms/logout">Log Out</a></li>';
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
</div>
