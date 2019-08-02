<?php 

	$forName;
		
	$sqparameter=$_GET['show'];
	$Connection=mysql_connect('localhost','root','');
	$Selected=mysql_select_db('phppro',$Connection);	
	$Query=" SELECT * FROM signup WHERE id='$sqparameter' ";
	$Execute=mysql_query($Query);
	while ($DataRows=mysql_fetch_array($Execute)) 
	{
		
		$forName=$DataRows["name"];	
		
	}
	

 ?>


<?php 
								

$ViewQuery="SELECT * FROM img WHERE db_email='$forName' ";
$Execute=mysql_query($ViewQuery);
/*$fetchdata=mysql_fetch_array($Execute);
*/if (empty(mysql_fetch_array($Execute))) 
{
echo "Please insert some images";
}
else
{

 ?>

<!DOCTYPE html>

<html>
<head>
	<title>Wow</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Made with WOW Slider - Create beautiful, responsive image sliders in a few clicks. Awesome skins and animations. Slider" />
	
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

</head>
<body style="background-color:#d7d7d7;margin:0">
	
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<?php $Execute=mysql_query($ViewQuery);
 
while ($row=mysql_fetch_array($Execute)) 
{   ?>
		
		<li><img src="<?php echo ' data:image/jpeg;base64,'.base64_encode($row['image']).' '?>" alt="add" title="" id="wows1_0"/></li>	
<?php  }   ?>
		 <!-- <li><img src="<?php echo ' data:image/jpeg;base64,'.base64_encode($row['image']).' '?>" alt="cat3" title="" id="wows1_1"/></li>
		<li><a><img src="<?php echo ' data:image/jpeg;base64,'.base64_encode($row['image']).' '?>" alt="responsive slider" title="" id="wows1_2"/></a></li>
		<li><img src="<?php echo ' data:image/jpeg;base64,'.base64_encode($row['image']).' '?>" alt="thum" title="" id="wows1_3"/></li> --> 
	
	</ul></div>

	<!-- <div class="ws_bullets"><div>
		<a href="#" title="add"><span><img src="<?php echo ' data:image/jpeg;base64,'.base64_encode($row['image']).' '?>" alt="add"/>1</span></a>
		<a href="#" title="cat3"><span><img src="data1/tooltips/cat3.jpg" alt="cat3"/>2</span></a>
		<a href="#" title="signup"><span><img src="data1/tooltips/signup.jpg" alt="signup"/>3</span></a>
		<a href="#" title="thum"><span><img src="data1/tooltips/thum.jpg" alt="thum"/>4</span></a> -->
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">slider</a> by WOWSlider.com v8.8</div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
<?php  }  ?>
</body>
</html>