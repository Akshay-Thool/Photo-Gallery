<?php 
session_start();
if (!isset($_SESSION['username'])) 
{
	header('location: home.php');
	exit();
}	

$username=$_SESSION['username'];
$url = "page2.php?username=".$username;
echo "welcome ".$username."go to ";

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <a href='<?php echo "page2.php?username=".$username ?>'>page2</a>
 </body>
 </html>