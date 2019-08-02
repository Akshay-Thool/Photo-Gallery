<!DOCTYPE html>	
<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/cssindex.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">



	<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="pages/engine1/style.css" />
<script type="text/javascript" src="pages/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->


<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
    position: relative;
  margin: auto;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 2.5s;
  animation-name: fade;
  animation-duration: 2.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>

</head>
<body>

<?php include "pages/header.php" ?>


<div>
	<br><br><br>
</div>
<div  >
	
<!-- Start WOWSlider.com BODY section -->
<!--
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><img src="i1.jpg" alt="add" title="add" id="wows1_0"/></li>
		<li><img src="i2.jpg" alt="back" title="back" id="wows1_1"/></li>
		<li><a href="http://wowslider.net"><img src="i3.jpg" alt="javascript photo gallery" title="signup" id="wows1_2"/></a></li>
		<li><img src="i4.jpg" height="500px" width="500px" alt="thum" title="thum" id="wows1_3"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="add"><span><img src="pages/data1/tooltips/add.jpg" alt="add"/>1</span></a>
		<a href="#" title="back"><span><img src="pages/data1/tooltips/back.jpg" alt="back"/>2</span></a>
		<a href="#" title="signup"><span><img src="pages/data1/tooltips/signup.jpg" alt="signup"/>3</span></a>
		<a href="#" title="thum"><span><img src="pages/data1/tooltips/thum.jpg" alt="thum"/>4</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">image carousel</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="pages/engine1/wowslider.js"></script>
<script type="text/javascript" src="pages/engine1/script.js"></script>
-->
<!-- End WOWSlider.com BODY section -->



<div class="slideshow-container">

<div class="mySlides fade">
   <img src="i1.jpg" style="width:100%;height: 500px">
 
</div>

<div class="mySlides fade">
   <img src="i2.jpg" style="width:100%;height: 500px">
 </div>

<div class="mySlides fade">
  <img src="i3.jpg" style="width:100%;height: 500px">
  </div>

<div class="mySlides fade">
  <img src="i4.jpg" style="width:100%;height: 500px">
  </div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>



</div>

<div class="body col-md-12" style="text-align: center;">
	<h2><b><br>BEAUTIFUL CLIENT PHOTO GALLERIES</b></h2>	
	The better way for modern photographers to store, manage and maintain photos on website.<br>
	<form action="pages/login.php"><br>
			<input class="btn btn-success" type="submit" name="" value="Get Started"><br><br><br>





	</div></div></div>																																			



	</form><br>
	
<br></div>

	</div>


<div>
	<?php Include ("include/footer.php") ?>
</div>
<script type="text/javascript" src="js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</body>
</html>
