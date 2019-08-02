<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php"); ?>

<?php 

function Redirect_to($New_Location)
{
		header("Location:$New_Location");
		exit;
}

function Login_attempt($Username,$Password)
{
	$Connection;
	$Query="SELECT * FROM signup WHERE db_email='$Username' AND db_pass='$Password'";
	$Execute=mysql_query($Query);
	if ($admin=mysql_fetch_assoc($Execute)) 
	{
		return $admin;
	}
	else
	{
		return null;
	}

}

function Admin_Login_attempt($Username,$Password)
{
	$NAME="akshaythool8@gmail.com";
	$PASS="akshay";
	if (($Username==$NAME) && ($Password==$PASS)) 
	{
		
		$_SESSION['SuccessMessage']="Welcome Akshay";
		Redirect_to("show_admin.php");	
	}
	else
	{
		
		$_SESSION['ErrorMessage']="Username / Password not matched";
		Redirect_to("admin-login.php");	
	}

}


function Signin_attempt($Username)
{

	$Connection;
	$Query="SELECT * FROM register WHERE db_email='$Username'";
	$Execute=mysql_query($Query);
	if ($admin=mysql_fetch_assoc($Execute)) 
	{
		$_SESSION["ErrorMessage"]="Username alredy taken";
		Redirect_to("login.php");
	}
	else
	{
		return null;
	}
}

function Login()
{
	if (isset($_SESSION["User_Id"])) 
	{
		return true;
	}
	else
	{
		$_SESSION["ErrorMessage"]="Login Required";
		Redirect_to("login.php");
	}
}

function confirm_login()
{
	if (!Login()) 
	{
		$_SESSION["ErrorMessage"]="Login Required";
		Redirect_to("login.php");
	}
}



 ?>