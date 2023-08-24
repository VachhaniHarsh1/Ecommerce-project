<?php
	include "config.php";
	session_start();
	if(isset($_SESSION['nam']))
	{
		echo "<script>window.location.replace('home.php')</script>";		
	}
?>

<!-- Header -->
	<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
    <title>Hello, world!</title>
  </head>
  <body>
<!-- Header End-->
<br><br>
		<!-- Login start -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	<div class="container col-md-5">
		<div class="card" style="text-align:center;background-image: url('img/e-commerce-online-shopping.jpg');">
			<div class="card-header" style="font-size:40px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:red;">Admin Login</div>
				<div class="card-body">
					<form method="post">
						<div class="row">
							<div class="col-md-8" style="margin:auto;">
								<input type="text" class="form-control" name="aname" placeholder="Enter User name..." required autocomplete="off"/>
							</div>
                    
						</div>
						<br>

						<div class="row">
							<div class="col-md-8" style="margin:auto;">
								<input type="password" class="form-control" name="apassword" placeholder="Enter Password..." required />
								<!--pattern="[a-z A-Z 0-9]{6,20}"-->
							</div>
						</div>
						<br>
						<button class="btn btn-success col-md-8" type="submit" name="btn2">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
		<!-- Login end -->
<!-- Footer -->
		
	<!-- Header Part  End -->
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<!-- Footer End-->

<?php
	include "config.php";
	
	if(isset($_REQUEST['btn2']))
	{
		$aname=$_REQUEST['aname'];
		// echo @$aname;
		$apassword=$_REQUEST['apassword'];
		// echo @$apassword;		
		 
		$rec=mysqli_query($conn,"SELECT * FROM adminlogin where aname='$aname' AND apassword='$apassword'")or die("login errror".mysqli_error($conn));
		
		if(mysqli_num_rows($rec) == 1)
		{
			while($num=mysqli_fetch_array($rec))
			{
				session_start();
				$nm=$_REQUEST['aname'];
				$pw=$_REQUEST['apassword'];
				$_SESSION['nam']=$nm;
				$_SESSION['pwd']=$pw;
			}
			header("location:home.php"); 
		}
		else
		{
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Wrong data insert!</strong> You Are Not Signup Please Change Email.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>'	;
		}
	}
?>