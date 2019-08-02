<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php");?>
<?php require_once("../Include/functions.php"); ?>
<?php Login(); ?>
<?php 

if (!isset($_SESSION['username'])) 
{
	header('location: login.php');
	exit();
}	

$username=$_SESSION['username'];
$url = "page2.php?username=".$username;
echo $username;

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
<link rel="stylesheet" type="text/css" href="../css/cssindex.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body >

<?php Include("../header.php"); ?>
					
			

<div style="background: url('../images/bg-body.jpg');" class="container">
	<div class="row">


		<div class="body" style="background: url('');background-repeat: no-repeat;background-size: cover";>
			<div style="margin-bottom: 900px" >
				<div style="margin-bottom: 20px;""><br>	
					<h2 id="heading" style="padding-top: 70px;color: #00C78A"><?php echo Message(); echo SuccessMessage(); ?></h2><br>
				</div>
				
				

				
			<div style="text-align: center;" class="col-md-12">
								<?php 
								
								$ViewQuery="SELECT * FROM signup WHERE db_email='$username' ";
								$Execute=mysql_query($ViewQuery);
								$fetchdata=mysql_fetch_array($Execute);
								$check_date=$fetchdata["date"];
								/*$check_date=mysql_real_escape_string($_POST['date']);*/
								/*if (empty($check_date)) 
								{
									
									echo "Gallery not found Please create one";
								}	
								else*/
								{

								$Execute=mysql_query($ViewQuery);	
								while ($DataRows=mysql_fetch_array($Execute)) 
								{
									$ID=$DataRows["id"];
									$Date=$DataRows["date"];
									$Name=$DataRows["name"];
									$Desp=$DataRows["desp"];
									$Image=$DataRows["thum"];

								 ?>	
								 <div style="padding-bottom: 25px; " class="col-md-4">
								 <div id="demo">
								 <div id="gallery_show" class="thumbnail img-back" style="width: 310px;height: 220px;">
								 	<img width="310px" height="220px" class="img-responsive img-rounded"   
								 	src="Upload/<?php echo $Image; ?>">

								 </div>
								 <div  style="padding-bottom: 20px" class=" caption">
								 	<h1> <?php 
									if (strlen($Name)>10) 
								 	 {
								 	 	$Name=substr($Name,0,16).'... ';
								 	 }
								 	echo htmlentities($Name); ?> </h1>
								 	<?php echo $Date; ?><br>
								 	 <?php 
								 	 if (strlen($Desp)>40) 
								 	 {
								 	 	$Desp=substr($Desp,0,33).'... read more';
								 	 }
								 	  echo $Desp;  ?> <br><br>
								 	
									<div style="margin-top: -10px" class="col-md-4">
									<form action="View.php?View=<?php echo $ID;?>">
										<a href="View.php?View=<?php echo $ID; ?>"><span class="btn btn-success">View</span></a>
									</form>
									</div>

									<div style="margin-top: -10px" class="col-md-4">
									<form action="add_gallery.php?Edit=<?php echo $ID; ?>" target="_blank">

										<a href="edit.php?Edit=<?php echo $ID; ?>"><span class="btn btn-warning">Edit</span></a>
									</div>
									</form>		
									
									<div  style="margin-top: -10px;" class="col-md-4">
								 		<form  action="Delete.php?Delete=<?php echo $ID;?>">
								 			<a href="Delete.php?Delete=<?php echo $ID; ?>"><span class="btn btn-danger">Delete</span></a>
											
										</div>
										</form>
								 </div>
								 </div>
								</div>	
								<?php } } ?>
							

								</div>
									
				</div>
			</div> 
		</div>
	</div>
	<?php  Include "../Include/footer.php"; ?>	



<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>	