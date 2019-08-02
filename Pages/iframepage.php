<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php") ?>
<?php require_once("../Include/functions.php") ?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome page</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/home_2.css">
	<link rel="stylesheet" type="text/css" href="../css/gallery.css">
</head>
<body>

		<div class="body">
			<div style="margin-bottom: 1400px" >
				<div class="btn-success" style="margin-bottom: 20px"><br>	
					<h2 id="heading" style="padding-top: 0px;color: blue">Create Gallery</h2><br>
				</div>
				
				<div class="col-md-12">		
					<div style="text-align: center;"><br> <?php echo Message(); echo SuccessMessage(); ?> </div>
				</div>
			<div style="text-align: center;" class="col-md-12">
								<?php 
								$ViewQuery="SELECT * FROM gallery ORDER BY date desc";
								$Execute=mysql_query($ViewQuery);
								while ($DataRows=mysql_fetch_array($Execute)) 
								{
									$ID=$DataRows["id"];
									$Date=$DataRows["date"];
									$Name=$DataRows["name"];
									$Desp=$DataRows["Desp"];


								 ?>
								 <div style="background-color: #f5f5f5" class="col-md-4">
								 	<div id="demo">
								 <div id="gallery_show" class=" thumbnail img-back">
								 	<img class="img-responsive img-rounded" width="350px" height="150px" src="../images/logo2.jpg">
								 </div>
								 <div  style="padding-bottom: 20px" class=" caption">
								 	<h1> <?php echo htmlentities($Name); ?> </h1>
								 	 <?php 
								 	 if (strlen($Desp)>50) 
								 	 {
								 	 	$Desp=substr($Desp,0,40).'... read more';
								 	 }
								 	  echo $Desp;  ?> <br>
								 	
									<div class="col-md-4">
									<form action="View.php?View=<?php echo $ID;?>">
										<input class="btn btn-success btn-lar" type="Submit" name="Submit" value="View">
									</form>
									</div>
									<div class="col-md-4">
									<form action="Edit.php?Edit=<?php echo $ID;?>" target="_blank" >
										<input class="btn btn-warning btn-lar" type="Submit" name="Submit" value="Edit">
									</div>
									</form>		
									<div  class="col-md-4">
								 		<form action="Delete.php?Delete=<?php echo $ID;?>">
											<input class="btn btn-danger btn-lar" type="Submit" name="Submit" value="Delete">
										</div>
										</form>
								 </div>
								 </div>
								</div>	
								<?php } ?>

								</div>
				</div>	
</div>
	
	</div>
	<div class="footer"><p>Theme by | Akshay Thool |&copy;2016-2020 --- All rights reserved.</p>
	This is the footer of the site.</div>
<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>	