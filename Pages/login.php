<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/functions.php"); ?>

<?php 
session_destroy();
if (isset($_POST['Submit'])) 
{
	$Username=mysql_real_escape_string($_POST["username"]);
	$Password=mysql_real_escape_string($_POST["password"]);



session_start();

//session_destroy();

if (isset($_SESSION['username'])) 
{
	/*$url = "login.php";
	header('location:'.$url);
	exit();*/
}
else if(isset($_POST['username']))
{
	$username=$_POST['username'];
	$_SESSION['username']=$username;
	/*$url = "login.php";
	header('location:'.$url);
	exit();*/
}



	if (empty($Username) || empty($Password)) 
	{
		$_SESSION['ErrorMessage']="All fields must be field out";
		Redirect_to("login.php");
	}
	else
	{
		$Found_Account=Login_attempt($Username,$Password);
		$_SESSION["User_Id"]=$Found_Account["id"];
		$_SESSION["User-name"]=$Found_Account["db_name"];
		
		if ($Found_Account) 
		{
			$_SESSION['SuccessMessage']="Welcome {$_SESSION["User-name"]}";
			Redirect_to("Gallery.php");
		}
		else
		{
			$_SESSION['ErrorMessage']="Username / Password not matched";
			Redirect_to("login.php");
		}
	}
}

 ?>


<!DOCTYPE html>	
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/cssindex.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../Include/bootstrapvalidator_0.5.2_css_bootstrapValidator.min.css">
</head>
<body>

<div class="header col-md-12">
			<div class="col-md-4">
				<h2 style="color: white">Gallery</h2>
			</div>
			<div class="col-md-8">
				
				<ul class="nav  nav-stacked">
				<li><a href="aboutus.php"><span class="glyphicon glyphicon-folder-plus"></span> AboutUs</a></li>
					<li><a href="admin-login.php"> Admin</a></li>
					<li class="active"><a href=""><span class="glyphicon glyphicon-user-add"></span> Login</a></li>
					<li><a href="../index.php"><span class=""></span> Home</a></li>
				</ul>
				
			</div>
		</div>

<div>
	<br><br><br>
</div>

	<div class="body col-md-12" style="background:url('../images/gallery.jpg');background-repeat: no-repeat;background-size: cover;padding-bottom: 25px">
		
		<br><br>


		<div class="col-md-12" >		
					<div style="text-align: center;"><br> <?php echo Message(); echo SuccessMessage(); ?> </div>
				</div>


		<div class=" col-md-4"></div>
		<div class="col-md-4 form-group" style="padding: 40px; text-align: center;box-shadow: 1px 2px 3px black;background-color: white;">
			<form action="" method="Post">
				<fieldset>
					<div class="form-group">
					<label id="heading" for="categoryname"><br><br><h3>Login</h3><br><br></label>
					<input class="form-control" type="email" name="username" id="categoryname" placeholder="Enter Name" required=""><br>
					<input class="form-control" type="password" name="password" id="categoryname" placeholder="Enter Password" required="">
<!-- 				<?php   $Table_Name=$_POST['name'];
						echo "db is ".$Table_Name;        ?> -->
					</div>
					<br>
					<input class="btn btn-success btn-block" type="submit" name="Submit" value="Login">
					<br> 
					
				</fieldset>
			</form>
			<form action="Signup.php" method="Post">
						<input class="btn btn-warning btn-block" type="submit" name="" value="Signup"><br>
					</form><br><br>
		</div>
		<div>
		</div> 
		<div class="col-md-4"></div>
	</div><br>				
	 </div>

	<?php Include "../include/footer.php" ?>


<script src='../Include/bootstrapvalidator_0.5.2_js_bootstrapValidator.min.js'></script>
<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>


