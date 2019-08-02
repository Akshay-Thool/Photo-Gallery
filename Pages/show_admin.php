<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/cssindex.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../Include/bootstrapvalidator_0.5.2_css_bootstrapValidator		.min.css">
</head>
<body>

<div style="position: ;background-color: #00C78A;" class="header col-md-12">
			<div class="col-md-4">
				<h2 style="color: white">Gallery</h2>
			</div>
			<div class="col-md-8">
				
				<div style="text-align: right;padding-top: 20px">
					
					
					<form action="logout.php">
					<input  class="btn btn-warning" type="submit" name="btn" value=" Logout">
					</form>
				</div>
			</div>
		</div>
<br><br><br>
<div class="col-md-12" >		
					<div style="text-align: center;"><br> <?php echo Message(); echo SuccessMessage(); ?> </div>
				</div>

<div class="col-md-12" >
	<h1 style="text-align: center;color: ">Login Accounts</h1><br>
</div>

<div class="col-md-2"></div>

<div class="col-md-8">
	

<div class="table table-responsive">	   	  
	 <table class="table table-striped table-hover">
	 	<tr>
	 		<th>Sr.No.</th>
	 		<th>Username</th>
	 		<th>Email</th>
	 		<th style="text-align: right;">Action</th>
	 	</tr>
<?php  $Connection;

$ViewQuery="SELECT * FROM signup WHERE db_name != '' ";
$ViewExecute=mysql_query($ViewQuery);
$SRNO="0";
while ($DataRows=mysql_fetch_array($ViewExecute)) 
{
	$FID=$DataRows['id'];
	$FNAME=$DataRows['db_name'];
	$FDATE=$DataRows['db_email'];
	
	$SRNO++;
	?>

	<tr>
		<td> <?php echo $SRNO; ?> </td>
		
		<td style="color: blue"> <?php if (strlen($FNAME)>20) { $FNAME=substr($FNAME,0,20)."..."; }
		 echo $FNAME; ?> </td>
		<td> <?php echo $FDATE ?> </td>

		<td style="position: center;">
				<a href="Delete.php?Delete=<?php echo $FID; ?>"><span style="text-align: center;" class="btn btn-danger">Delete</span></a>
		</td>
		<td>
		</td>

	</tr>	

<?php } ?>


 
	 </table>
</div>
</div>

<div class="col-md-2"></div>








<div class="col-md-12">
	<?php  Include "../Include/footer.php"; ?>
</div>
		
<script src='../Include/bootstrapvalidator_0.5.2_js_bootstrapValidator.min.js'></script>
<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>