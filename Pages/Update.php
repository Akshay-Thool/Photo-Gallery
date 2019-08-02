<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/functions.php"); ?>

<?php confirm_login(); ?>
<?php 


if (!isset($_SESSION['username'])) 
{
	header('location: login.php');
	exit();
}	

$username=$_SESSION['username'];
$url = "page2.php?username=".$username;
// echo "welcome ".$username;



$Update_Record=$_GET['Update'];
$showquery="SELECT * FROM signup WHERE id='$Update_Record'";
$Update=mysql_query($showquery);


/*if (empty(mysql_fetch_array($Update))) 
	{
		echo "Gallery not found Please create one";
	}*/
while($DataRows=mysql_fetch_array($Update))
{
	$get_Date=$DataRows["date"];
	$get_Name=$DataRows["name"];
	$get_Desp=$DataRows["desp"];
	$get_Image=$DataRows["thum"];
}	
	
	if(isset($_POST["Submit"]))
	{
		$GName=mysql_real_escape_string($_POST["gname"]);
		$Date=mysql_real_escape_string($_POST["date"]);
		$Desp=mysql_real_escape_string($_POST["description"]);


		$Image=$_FILES["Image"]["name"];
		$Target="Upload/".basename($_FILES["Image"]["name"]);		


		$filename=$_FILES['img']['name'];
		$tmpname=$_FILES['img']['tmp_name'];
		$filetype=$_FILES['img']['type'];

		for ($i=0; $i <=count($tmpname)-1 ; $i++) 
		{ 
			$name=addslashes($filename[$i]);
			$tmp=addslashes(file_get_contents($tmpname[$i]));

			$MyQuery="UPDATE img SET name='$name',image='$tmp',db_email='$username',
			 WHERE name='$get_Name'";
			 $MyExecute=mysql_query($MyQuery);
	
		}




		
		 if(strlen($Name)>99)
		{
			$_SESSION["ErrorMessage"]="Too long name for gallery";
			Redirect_to("add_gallery.php");
		}
		else if(strlen($Desp)>199)
		{
			$_SESSION["ErrorMessage"]="Too long Description for gallery";
			Redirect_to("add_gallery.php");
		}
		else
		{

			$Query="UPDATE signup SET date='$Date',name='$GName',desp='$Desp',thum='$Image' WHERE name='$get_Name'";		
			$Execute=mysql_query($Query);
			move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
			if($Execute)
			{
				$_SESSION["SuccessMessage"]="Gallery Successfully Updated";
				Redirect_to("gallery.php");				
			}
			else
			{
				$_SESSION["ErrorMessage"]="Something went wrong";
				Redirect_to("Update.php");
			}
		}
	}
echo $get_Name;
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Gallery</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/home_2.css">
</head>
<body>
	



		<div  style="background: url('../images/back.jpg');background-repeat: no-repeat;background-size: cover;padding-bottom: 50px;" class="body">
			<div style="padding-bottom: 530px"><br><br>
				
				<div class="col-md-12"><br><br><br>
					<div class="col-md-4" style="padding-bottom: 100px"></div>
						<div class="col-md-4 form-group" style="text-align: center;box-shadow: 1px 2px 3px black;background-color: white;">
<!-- 				<img width="200px" height="300px" src="Upload/<?php echo $forimage; ?>"> -->
			<form action="" method="Post" enctype="multipart/form-data">
				<fieldset>
				<div class="form-group">
						<label class="heading" for="galleryname"><br><br>  <h4 id="heading">Update gallery</h4><br><br></label>

					<input class="form-control" type="text" name="gname" id="galleryname" placeholder="Enter Name of gallery" value="<?php echo $get_Name ; ?>" ><br>
					
					<input class="form-control" type="date" name="date" id="gallerydate" 
					value="<?php echo $get_Date ; ?>" ><br>

					<div class="form-group">
						
						<label for="Image"><span class="FieldInfo">Set Thumnail : </span></label>
						<input type="file" class="form-control" name="Image" id="imageselect"  value="<?php echo $get_Image  ?>">
					</div>

					<div class="form-group">
						
						<label for="img"><span class="FieldInfo">Add Photos : </span></label>
						<input type="file" multiple="" class="form-control" name="img[]" id="addphotos" >
					</div>

					<!-- <textarea class="form-control" type="text" name="description" id="gallerydescription" placeholder="Descripe gallery" value="<?php echo $get_Desp; ?>" > </textarea> <br><br>	 -->

					<input type="text" class="form-control" name="description" id="gallerydescription" placeholder="Descripe Gallery"
					value="<?php echo $get_Desp; ?>" ><br><br>
					
					<div> <?php echo Message(); echo SuccessMessage(); ?> </div>
					<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Update gallery"><br>
				</div>
			</fieldset>
			</form>
		</div> 
			<div class="col-md-4"></div>
		</div>
		</div>
	</div>
			<?php Include "../Include/footer.php" ?>	

<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>	