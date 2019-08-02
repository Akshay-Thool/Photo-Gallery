<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
	html,body
	{
		width: 100%;
		height: 100%;
		margin: 0px;
	}
	div
	{
		border: 1px solid black;
	}	
	.container
	{
		margin: 0 auto;
		margin-top: 20px;
		position: relative;
		width: 900px;
		height: 0px;
		padding-bottom: 40%;
		background: #4c4c4c;
		border: 
	}
	.slide_img
	{
		position: absolute;
		height: 100%;
		width: 100%;
	}
	.slide_img img
	{
		width: 100%;
		height: 100%;
	}
	#i1,#i2,#i3
	{
		display: none;
	}
	.pre, .nxt
	{
		width: 12%;
		height: 100%;
		position: absolute;
		top: 0px;
		background-color: yellow;
		z-index: 99;
		cursor: pointer;
	}
	.pre
	{
		left: 0;
	}
	.nxt
	{
		right:0;
	}
	.nav
	{
		width: 100%;
		height: 11px;
		bottom: 12%;
		position: absolute;
		text-align: center;
		z-index: 99;
	}
	.dots
	{
		top: -5px;
		width: 18px;
		height: 18px;
		margin: 0 4px;
		position: relative;
		border-radius: 50%;
		display: inline-block;
		background-color: red;
	}
	.slide_img
	{
		z-index: -1px;
	}
	#i1:checked ~ #one,
	#i2:checked ~ #two, 
	#i3:checked ~ #three
	{
		z-index: 9;
	}
	#i1:checked ~ .nav #dot1,
	#i2:checked ~ .nav #dot2,
	#i3:checked ~ .nav #dot3
	{
		background-color: blue;
	}

	</style>
	<title>slider using css</title>
</head>
<body>

<div class="container">

	<input type="radio" name="images" id="i1" checked>
	<input type="radio" name="images" id="i2">
	<input type="radio" name="images" id="i3">

	 <div class="slide_img" id="one">
	 	<img src="../images/logo.png">
	 		<label for="i3" class="pre"></label>
	 		<label for="i2" class="nxt"></label>
	  </div>

	 <div class="slide_img" id="two">
	 	<img src="../images/logo2.jpg">
	 	<label for="i1" class="pre"></label>
	 	<label for="i3" class="nxt"></label>
	 </div>

	 <div class="slide_img" id="three">
	 	<img src="../images/logo3.jpg">
	 	<label for="i2" class="pre"></label>
	 	<label for="i1" class="nxt"></label>
	 </div>
	 <div class="nav">
	 	<label class="dots" id="dot1" for="i1"></label>
	 	<label class="dots" id="dot2" for="i2"></label>
	 	<label class="dots" id="dot3" for="i3"></label>
	 </div>
</div>

<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>