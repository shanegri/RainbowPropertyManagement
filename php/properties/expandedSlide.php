
<div class="slideshow">
<div class="slideshowImageContainer" style="overflow: hidden;">
<?php
$images = $this->images;
/*
*src="<?php echo $images[$i]."?=".filemtime($images[$i]);?>"
*/
for($i = 0 ; $i < sizeof($images) ; $i++){
	?>
	<div class="slide" >
	<img id="<?php echo $images[$i]."?=".filemtime($images[$i]);?>" src="Images/Loading.gif" class="loading slideIm si<?php echo $i; ?>" >
	</div>
	<?php
}
echo '</div>';
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

.slide {
	height: 400px;
}
.loading {
	width: 4%;
	height: 4%;
	object-fit: contain;
}

.slideIm {
user-drag: none;
user-select: none;
-moz-user-select: none;
-webkit-user-drag: none;
-webkit-user-select: none;
-ms-user-select: none;
}
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
var slideObjects = new Array();
var dots = document.getElementsByClassName('dot');
var slideAmt = slides.length;


function img(slideElem, slideID){
	this.isLoaded = false;
	this.slideElem = slideElem;
	this.id = slideID;
	this.im = $('.si'+slideID);
	this.imURL = this.im.attr('id');

	this.display = function(){
		this.load();
		for(var i = 0 ; i < slideAmt ; i++){
			slides[i].style.display = "none";
			dots[i].className = dots[i].className.replace(" Dotactive", "");
		}
		dots[this.id].className = dots[this.id].className += " Dotactive";
		slideElem.style.display = "flex";
	}

	this.load = function(){
		if(!this.isLoaded){
			this.isLoaded = true;
			var id = this.id;
			var im = this.im;
			var download = $("<img>");
			download.on('load', function(){
				im.attr("src", $(this).attr("src"));
				im.removeClass("loading");
				loadNext(id);
				loadPrev(id);
				//console.log(id  + " Loaded");
			});
			download.attr("src", this.imURL);
		}
	}
}

function loadNext(id){
	if(id != slideObjects.length - 1){
		if(!slideObjects[id + 1].isLoaded) slideObjects[id + 1].load();
	}
}

function loadPrev(id){
	if(id === 0){
		if(!slideObjects[slideObjects.length - 1].isLoaded) slideObjects[slideObjects.length - 1].load();
	} else {
		if(!slideObjects[id - 1].isLoaded) slideObjects[id - 1].load();
	}
}

for(var i = 0; i < slides.length ; i++){ slideObjects[i] = new img(slides[i], i); }
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
	counter = n;
	slideObjects[n].display();
}

$(document).keydown(function(e){
	switch (e.which) {
		case 39:
		advance();
		break;
		case 37:
		reverse();
		break;
	}
});


$('.slide').on('mousedown', function(e){
	var initX = e.pageX;
	$(this).on('mousemove', function(eS){
		var shift = eS.pageX - initX;
		if(shift < 0){
			$('.slideIm').css('margin-left', shift);
			$('.slideIm').css('margin-right', 0);
		} else {
			$('.slideIm').css('margin-right', -shift);
			$('.slideIm').css('margin-left', 0);
		}
		if(shift > 150){
			reverse();
			$('.slideIm').css('margin-right', 30);
			$('.slideIm').animate({marginRight: "0"}, "fast");
		}
		if(shift < -150){
			advance();
			$('.slideIm').css('margin-left', 30);
			$('.slideIm').animate({marginLeft: "0"}, "fast");
		}
	}).on('mouseup mouseleave', function(eS){
		$(this).unbind('mousemove');
		$(this).unbind('mouseup');
		$('.slideIm').css("margin-right", "0");
		$('.slideIm').css("margin-left", "0");
	});
});

var initTouch = false;
var remove = false;
el = document.getElementsByClassName('slideshowImageContainer')[0];
el.addEventListener('touchmove', function(e){
	var t = e.targetTouches[0];
	if(!initTouch) { initTouch = t.pageX};
	var shift = initTouch - t.pageX;
	if(remove)(shift = 0);
	if(shift < 0){
		$('.slideshowImageContainer').css('padding-right', 0);
		$('.slideshowImageContainer').css('padding-left', -shift);
	} else if (shift > 0){
		$('.slideshowImageContainer').css('padding-right', shift);
		$('.slideshowImageContainer').css('padding-left', 0);
	}
	if(shift > 100){
		$('.slideshowImageContainer').css('padding-right', 0);
		$('.slideshowImageContainer').css('padding-left', 30);
		initTouch = false;
		remove = true;
		$('.slideshowImageContainer').animate({paddingLeft: "0"}, "fast");
		advance();
	} else if (shift < -100){
		$('.slideshowImageContainer').css('padding-left', 0);
		$('.slideshowImageContainer').css('padding-right', 30);
		initTouch = false;
		remove = true;
		reverse();
		$('.slideshowImageContainer').animate({paddingRight: "0"}, "fast");
	}
	el.addEventListener('touchend', function(et){
		remove = false;
		initTouch = false;
		$('.slideshowImageContainer').css('padding-right', 0);
		$('.slideshowImageContainer').css('padding-left', 0);
	});
});

</script>
