<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/functions.php"); ?>

<?php


$Delete_record_id=$_GET['Delete'];	
$Delete_Query=" DELETE FROM signup WHERE id='$Delete_record_id' ";
$Execute=mysql_query($Delete_Query);

$Select_Query="SELECT  FROM signup WHERE id='$Delete_record_id' ";
$ExecuteS=mysql_query($Select_Query);
Redirect_to("gallery.php");


?>