<?php
$db = Database::getInstance();
$query = "SELECT * FROM about where id=1";
$data = $db->fetch($query);
$row = $data[0];
?>
<div class="card" style="padding: 10px; margin-top: 20px;">
<?php if(isset($_SESSION['id'])){
  echo '<a style="float: right" href="form?about"><button>EDIT</button></a>';
} ?>
<h3><?php echo $row['HEADER1'] ?></h2>
<h3><small><?php echo $row['TEXT1'] ?></small></h3>
<h3><?php echo $row['HEADER2'] ?></h2>
<h3><small><?php echo $row['TEXT2'] ?></small></h3>
</div>
