<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php") ?>
<?php require_once("../Include/functions.php") ?>
<?php confirm_login(); ?>

<?php

			if (isset($_POST['add'])) 
			{
				$_SESSION['SuccessMessage']="Welcome";
				Redirect_to("Edit.php");
			}
											
			if (!isset($_SESSION['username'])) 
			{
				header('location: login.php');
				exit();
			}	

			$username=$_SESSION['username'];
			$url = "page2.php?username=".$username;
			/*echo $username;*/

?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit gallery</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/Edit.css">
</head>
<body>

<?php 
		
	$sqparameter=$_GET['Edit'];
	$ConnectingDB;	
	$Query=" SELECT * FROM signup WHERE id='$sqparameter' ";
	$Execute=mysql_query($Query);
	while ($DataRows=mysql_fetch_array($Execute)) 
	{
		$ID=$DataRows["id"];
		$forName=$DataRows['name'];
		$forDate=$DataRows['date'];
		$forDesp=$DataRows['desp'];
		$forThum=$DataRows['thum'];

	}

 ?>

		<div style="background-color:#00C78A ; position: fixed;box-shadow: 1px 2px 3px black;" class="left-side col-md-2">
				
				<h3 style="color: white"><?php echo $forName; ?></h3>
				<data><?php echo $forDate; ?></data><br>

				<h4 style="color: white">Cover Photo :</h4>
				<div>
				<img class="img img-rounded" style="box-shadow: 1px 2px 3px black; max-width: 100%;"  height="200px"  src="Upload/<?php echo $forThum; ?>"></div>
				<h3 style="color: white">Description</h3>
				<p><?php echo $forDesp; ?></p>				
				
				
				<br>
				<h4 style="color: white">Add photos :</h4>
				<!-- <div style="text-align: center;" >
					<form action="Edit.php" method="POST">	
						<input  type="file" name="add" multiple="">
					</form><br>
				</div>
 -->


				<div style="text-align: center; padding-right: 30px">
									<form action="add_gallery.php?Update=<?php echo $ID; ?>" target="_blank">

										<a href="Update.php?Update=<?php echo $ID; ?>"><span class="btn btn-warning">Update Gallery</span></a>
									</form>
									</div>
										




				
				<div style="text-align: center; padding-right: 30px">
									<form action="add_gallery.php?view=<?php echo $ID; ?>" target="_blank">

										<a href="view_gallery.php?View=<?php echo $ID; ?>"><span class="btn btn-success">View Gallery</span></a>
									</form>
									</div>
				
				
				<br><br><br><br><br>
			</div>		
	</div>

<div class="col-md-2"></div>
<div class="heade	 col-md-10" style="background-color:  #00C78A">
<div class="col-md-4">
				<h2 style="color: white">Gallery</h2>
			</div>
			
			<div class="col-md-8">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>
					<li><a href="add_gallery.php"><span class="glyphicon glyphicon-plus"></span> New Album</a></li>
				</ul>
				
			</div>
		</div>			
	</div>

<div class="col-md-2"></div>
<div class="container col-md-10">
	<div style="background: url('../images/bg-body.jpg');">
		<br>
		

		<?php 
								
								


								$ViewQuery="SELECT * FROM img WHERE db_email='$forName' ";
								$Execute=mysql_query($ViewQuery);
/*								$fetchdata=mysql_fetch_array($Execute);
*/								if (empty(mysql_fetch_array($Execute))) 
								{
									echo "Please insert some images";
								}
								else
								{
								/*$Execute=mysql_query($ViewQuery);	
								while ($DataRows=mysql_fetch_array($Execute)) 
								{
									$forimages=$DataRows['image'];
								}*/
								$Execute=mysql_query($ViewQuery);
								while ($row=mysql_fetch_array($Execute)) 
{
	


	echo ' 
	<div class="col-md-2" >
								<div style=" ;padding-top: 10px;padding-bottom: 10px">
									<img class="img img-rounded" style="box-shadow: 1px 2px 3px black; max-width: 100%; "   width="170px" height="170px"  src="data:image/jpeg;base64,'.base64_encode($row['image']).'">
								</div>
							</div>
';
}

								 ?>	
							<!--  <div class="col-md-2">
								<div style=" ;padding-top: 10px;padding-bottom: 10px">
									<img class="img img-rounded" style="box-shadow: 1px 2px 3px black" width="150px" height="200px" src="Upload/<?php echo $forimages; ?>">
								</div>
							</div> -->
				<?php } ?>





	</div>
</div> <!-- photos side -->





		<div class="col-md-2"></div>	
<div class="col-md-10" style="background-color: black;
	color: white;
	text-align: center;
	padding-bottom: 30px;"><br><p>Theme by | Akshay Thool |&copy;2016-2020 --- All rights reserved.</p>
	This is the footer of the site.</div>
	</div>
</div>



<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>	