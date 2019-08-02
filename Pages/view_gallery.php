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
	<title>View gallery</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/Edit.css">
</head>
<body>

<?php 
		

	$sqparameter=$_GET['View'];
	$ConnectingDB;	
	$Query=" SELECT * FROM signup WHERE id='$sqparameter' ";
	$Execute=mysql_query($Query);
	while ($DataRows=mysql_fetch_array($Execute)) 
	{
		$ID=$DataRows['id'];
		$forName=$DataRows['name'];
		$forDate=$DataRows['date'];
		$forDesp=$DataRows['desp'];
		$forThum=$DataRows['thum'];

	}

 ?>
		<div >
				<img height="500px" width="1349px" src="Upload/<?php echo $forThum; ?>">
		</div>			
				
<!-- style="background: url('Upload/<?php echo $forThum; ?>');"
 -->

	
		
		

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
								 
								 $temp= $ID;

								while ($row=mysql_fetch_array($Execute)) 
{
	

     

	echo ' 
	<div class="col-lg-4" >
								<div>
									'?> <a href="Wow slider/wowslider.php?show= <?php echo $temp; ?><?php echo '"><img  width="433px" style="max-width : 100%;max-width: 100%;" height="170px" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"></a>
								</div>
							</div>
';
}

								 ?>	
							
				<?php } ?>




	</div>
</div> <!-- photos side -->





		
<div class="col-md-12" style="background-color: black;
	color: white;
	text-align: center;
	padding-bottom: 30px;"><br><p>Theme by | Akshay Thool |&copy;2016-2020 --- All rights reserved.</p>
	This is the footer of the site.</div>
	




<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>	