
<div class="slideshow">

<?php
$images = $this->images;
for($i = 0 ; $i < sizeof($images) ; $i++){
	?>
	<div class="slide" >
	<img class="slideIm" src="<?php echo $images[$i]?>	">
	</div>
	<?php
}
if(sizeof($images) == 0){
	?>
	<div class="slide" >
	<img class="slideIm" src="../../images/temp.png">
	</div>
	<?php
}

?>

</div>

<div class="arrow text-center" >
<a onclick="reverse()" style="float: left; border-radius: 5px; margin-left: 15px;">&#x2190;</a>
  <?php
	$images = $this->images;
	for($i = 0 ; $i < sizeof($images); $i++){
	?>
  	<span class="dot" onclick="goto(<?php echo $i?>)"></span>
	<?php
}

if(sizeof($images) == 0){
	?>
	<span class="dot" onclick="goto(0)"></span>
	<?php
}
?>

<a onclick="advance()" style="float: right; border-radius: 5px;  margin-right: 15px">&#x2192;</a>
</div>

<style media="screen">
@media only screen and (max-width: 1000px){
	.dot {
		width: 5px;
		height: 5px;
	}
	.arrow {
		font-size: 30px;
	}

}
</style>
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
