<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/functions.php"); ?>
<?php  	
	if(isset($_POST["Submit"]))
	{
		$Image=$_FILES["Image"]["pname"];
		$Target="Upload/".basename($_FILES["Image"]["pname"]);

		$Image=mysql_real_escape_string($_POST["Image"]);

		
		
		
			global $Selected;
			$Query="Insert into gallery(name,date,Desp,images)values('$Name','$Date','$Desp','$Image')";
			$Execute=mysql_query($Query);
			move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
			if($Execute)
			{
				$_SESSION["SuccessMessage"]="Gallery Successfully created";
				Redirect_to("gallery.php");				
			}
			else
			{
				$_SESSION["ErrorMessage"]="Something went wrong";
				Redirect_to("add_gallery.php");
			}
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Album</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/home_2.css">
</head>
<body>


												
<div class="container">
	<div class="row">
		<div class="body">
			<div><br><br>
				
				<div class="col-md-12"><br><br><br>
					<div class="col-md-4" style="padding-bottom: 100px"></div>
						<div class="col-md-4 form-group" style="text-align: center;box-shadow: 1px 2px 3px black;background-color: white;">
			<form action="add_gallery.php" method="Post">
				<fieldset>
					<div class="form-group">
					<label for="galleryname"><br><br><h4 id="heading">Create gallery</h4><br><br></label>
					
					<div style="color: green;">  Select Image : </div><input class="form-control" type="File" name="Image"><br>
					
					<div> <?php echo Message(); echo SuccessMessage(); ?> </div>
					<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Create gallery"><br>
					</div>
				</fieldset>
			</form>

		</div> 
		

<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>	