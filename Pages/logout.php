<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php");?>
<?php require_once("../Include/functions.php"); ?>
<?php 

$_SESSION["User_Id"]=null;
session_destroy();
Redirect_to("../index.php");

?>