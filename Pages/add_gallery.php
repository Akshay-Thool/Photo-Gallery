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



	
	if(isset($_POST["Submit"]))
	{
		$Name=mysql_real_escape_string($_POST["name"]);
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
			mysql_query("INSERT INTO img(name,image,db_email) VALUES ('$name','$tmp','$Name')");
		}




		if(empty($Name) || empty($Date) || empty($Desp) ||	 empty($Image))
		{
			$_SESSION["ErrorMessage"]="All fields must be field";
			Redirect_to("add_gallery.php");
		}
		else if(strlen($Name)>99)
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

	
			global $Selected;
			$Query="INSERT INTO signup(db_email,date,name,desp,thum) 
					VALUES('$username','$Date','$Name','$Desp','$Image')";

					/*"INSERT INTO signup(db_name,db_email,db_pass) 
					VALUES('$FullName','$Email','$Password')";*/

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
	

<!-- <div style="position: absolute;" class="header col-md-12" >
			<div class="col-md-4">
				<h2 style="color: white">Gallery</h2>
			</div>
			<div class="col-md-8">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="#"><span class="glyphicon-plus"></span> New Album</a></li>
				</ul>				
			</div>
		</div> -->
											
<!--  <?php 

	$sqparameter=$_GET['$id'];
	$ConnectingDB;	
	$Query="SELECT * FROM gallery WHERE id='$sqparameter'";
	$Execute=mysql_query($Query);
	while ($DataRows=mysql_fetch_array($Execute)) 
	{
		$forimage=$DataRows['images'];

	}

 ?> -->
		<div  style="background: url('../images/back.jpg');background-repeat: no-repeat;background-size: cover;padding-bottom: 50px;" class="body">
			<div style="padding-bottom: 530px"><br><br>
				
				<div class="col-md-12"><br><br><br>
					<div class="col-md-4" style="padding-bottom: 100px"></div>
						<div class="col-md-4 form-group" style="text-align: center;box-shadow: 1px 2px 3px black;background-color: white;">
<!-- 				<img width="200px" height="300px" src="Upload/<?php echo $forimage; ?>"> -->
			<form action="add_gallery.php" method="Post" enctype="multipart/form-data">
				<fieldset>
				<div class="form-group">
						<label class="heading" for="galleryname"><br><br>  <h4 id="heading">Create gallery</h4><br><br></label>
					<input class="form-control" type="text" name="name" id="galleryname" placeholder="Enter Name of gallery"><br>
					<input class="form-control" type="date" name="date" id="gallerydate" ><br>

					<div class="form-group">
						
						<label for="Image"><span class="FieldInfo">Set Thumnail : </span></label>
						<input type="file" class="form-control" name="Image" id="imageselect" >
					</div>

					<div class="form-group">
						
						<label for="img"><span class="FieldInfo">Add Photos : </span></label>
						<input type="file" multiple="" class="form-control" name="img[]" id="addphotos" >
					</div>

					<textarea class="form-control" type="text" name="description" id="gallerydescription" placeholder="Descripe gallery"></textarea> <br><br>	
					<div> <?php echo Message(); echo SuccessMessage(); ?> </div>
					<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Create gallery"><br>
				</div>
			</fieldset>
			</form>
		</div> 
			<div class="col-md-4"></div>
		</div>
		</div>
	</div>
			<?php Include "../Include/footer.php" ?>	


<script type="text/javascript">
 
   $(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            name: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply First Name'
                    	},
                    	regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'First Name can only consist of Alphabets'
                        

                        }

                    }
                },
               
               
               
	 email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
            password: {
            validators: {
                identical: {
                    field: 'confirmPassword',
                    message: 'Confirm your password below - type same password please'
                }
            }
        },

          confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'Confirm your password below - type same password please'
                }
            }
        },
         
    
            }
        })
    
  
});

 </script>













<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>	