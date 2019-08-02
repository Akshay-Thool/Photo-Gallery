<?php require_once("../Include/DB.php"); ?>
<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/functions.php"); ?>

<?php 
  
if (isset($_POST['create_account'])) 
{
   $FullName=mysql_real_escape_string($_POST["name"]);
   $Email=mysql_real_escape_string($_POST["email"]);
   $Password=mysql_real_escape_string($_POST["password"]);

   /*$varCheckUsername="SELECT * FROM signup WHERE db_email='$Email'";
   $varCheckUsernameResult = mysqli_query($Connection, $varCheckUsername);

    if (mysqli_num_rows($varCheckUsernameResult) > 0 || mysqli_num_rows($varCheckUsernameResult)==1)
    {
    
        echo "<script>alert('User Name Already Taken By Another User')</script>";
        echo "<script>location='signup.php'</script>";
    }

    if (mysqli_num_rows($Execute) > 0 || mysqli_num_rows($Execute)==1)
    {
    
        echo "<script>alert('User Name Already Taken By Another User')</script>";
        echo "<script>location='signup.php'</script>";
    }*/

    $check=Signin_attempt($Email);


    /*else
    {*/
        
       $varInsertQuery="INSERT INTO signup(db_name,db_email,db_pass) VALUES('$FullName','$Email','$Password')";
       $Execute_two=mysql_query($varInsertQuery);

               /*$sql = "CREATE TABLE $FullName  
               ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, reg_date TIMESTAMP ,name VARCHAR(100) ,
                 desp VARCHAR(200) , thum VARCHAR(100), images VARCHAR(100) )";                  
                 $ExecuteFolder=mysql_query($sql);*/
                
        

          if($Execute_two)
          {
            $_SESSION["SuccessMessage"]="Account Successfully created";
            Redirect_to("login.php");       
          }
          else
          {
            $_SESSION["ErrorMessage"]="Something went wrong";
            Redirect_to("signup.php");
          }
         
    }
/*}*/


?>


<!DOCTYPE html>	
<html>
<head>
	<title>Sign page</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/cssindex.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="bootstrapvalidator_0.5.2_css_bootstrapValidator.min.css">
</head>
<body>

<div class="header col-md-12">
			<div class="col-lg-4">
				<h2 style="color: white">Gallery</h2>
			</div>
			<div class="col-md-8">
				
				<ul class="nav  nav-stacked">
					<li><a href="Admin.php"> Admin</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-user-add"></span> Login</a></li>
					<li><a href=""><span class="glyphicon glyphicon-folder-plus"></span> Examples</a></li>
					<li><a href="../index.php"><span class=""></span> Home</a></li>
				</ul>
				
			</div>
		</div>

<div>
	<br><br><br>
</div>

	<div class="body col-md-12" style="background:url('../images/Signup2.jpg');background-repeat: no-repeat;background-size: cover;padding-bottom: 25px">
		
		<br><br>
		<div class=" col-md-3"></div>
		<div class="col-md-6 form-group" style=" text-align: center;box-shadow: 1px 2px 3px black;background-color: white;">
      <div class="row">
<form class="form-horizontal" method="post" id="reg_form" enctype="multipart/form-data">
                                             
                           <label id="heading" for="categoryname"><br><br><h4>Signup</h4><br><br></label>    

                                        <div class="form-group">
                                          <label class="col-md-4 control-label">Enter Name</label>
                                           <div class="col-md-6  inputGroupContainer">
                                            <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-envelope text-primary"></i></span>
                                              <input name="name" class="form-control"  placeholder="Enter Name" required/> 
                                            </div>
                                          </div>
                                        </div>
                                      
       <div class="form-group">
        <label class="col-md-4 control-label">E-Mail</label>
        <div class="col-md-6 inputGroupContainer">
          <div class="input-group">
          	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            	<input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
          </div>
        </div>
      </div>





      <div class="form-group has-feedback">
            <label for="password"  class="col-md-4 control-label">Password</label>  
                <div class="col-md-6  inputGroupContainer">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" id="userPw" type="password" placeholder="password" 
                       name="password" data-minLength="5"
                       data-error="some error"
                       required/>	
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
                </div>
             </div>
        </div>
     
        <div class="form-group has-feedback">
            <label for="confirmPassword"  class="col-md-4 control-label">
                   Confirm Password
                </label>
                 <div class="col-md-6  inputGroupContainer">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control {$borderColor}" id="userPw2" type="password" placeholder="Confirm password" 
                       name="confirmPassword" data-match="#confirmPassword" data-minLength="5"
                       data-match-error="some error 2"
                       required/>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
      			 </div>
             </div>
        </div>									                                                                                
                                     <br> <br><br>  <input type="hidden" name="subjectpaper" value="tpaper">
                                    <!-- Button -->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label"></label>
                                      <div class="col-md-4">
                                        <button type="submit" class="btn btn-warning" name="create_account">
                                           <strong style="color: black;font-weight: bold;">Create Account</strong> 
                                           <span class="glyphicon glyphicon-send"></span>
                                        </button>
                                      </div>
                                    </div>
              </div>
           </div>
</form>


		</div> 
		<div class="col-md-3"></div>
	</div><br>				
	 </div>
	<?php Include "../include/footer.php" ?>



<script type="text/javascript" src="../js/jquery-3.2.1min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
 <script src='bootstrapvalidator_0.5.2_js_bootstrapValidator.min.js'></script>


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


</body>
</html>
