
<div class="container-fluid slideshow">


<?php
$images = $this->images; 
for($i = 0 ; $i < sizeof($images) ; $i++){
	?>
	<div class="slide col-xs-12 fadeS"> 
	<img class="slideIm" src="<?php echo $images[$i]?>	">
	</div>
	<?php
}

?>

</div>

<div class="arrow text-center">
<a onclick="reverse()" style="float: left;">&#x2190;</a>
  <?php
	$images = $this->images; 
	for($i = 0 ; $i < sizeof($images) ; $i++){
	?>
  	<span class="dot" onclick="goto(<?php echo $i?>)"></span> 
	<?php
}

?>
<a onclick="advance()" style="float: right">&#x2192;</a>
</div>


<div style="text-align:center">

</div>

<script>

var counter = 0;
var slides = document.getElementsByClassName('slide');
var dots = document.getElementsByClassName('dot');
var slideAmt = slides.length;
goto(counter);


function advance(){
	if(counter < slideAmt - 1){
		counter++;
		goto(counter);
	} else {
		counter = 0;
		goto(counter);
	}
}

function reverse(){
	if(counter > 0){
		counter--;
		goto(counter);
	} else {
		counter = slideAmt - 1;
		goto(counter);
	}
}


function goto(n){
	for(var i = 0 ; i < slideAmt ; i++){
		if(i===n){
			console.log(slideAmt);
			slides[i].style.display = "flex";
			dots[i].className = dots[i].className += " Dotactive";
		} else {
			slides[i].style.display = "none";
			dots[i].className = dots[i].className.replace(" Dotactive", "");

		}
	}
}

</script>