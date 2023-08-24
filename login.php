<?php	
	include "config.php";
	if(isset($_REQUEST['bt2']))
	{
		$email=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		
		$rec = mysqli_query($conn,"select id,name,password,email from registrationclient where email='$email' and password='$password'")or die("Select error".mysqli_error($conn));
		
		if(mysqli_num_rows($rec) > 0)
		{
			while($nums=mysqli_fetch_array($rec))
			{
				session_start();
				$id=$nums['id'];
				$name=$nums['name'];
				$password=$nums['password'];
				$email=$nums['email'];
				// echo @$id." ".@$name." ".@$password." ".@$email;
				
				$_SESSION['id']=$id;
				$_SESSION['name']=$name;
				$_SESSION['password']=$password;
				$_SESSION['email']=$email;
				
				$id=$_SESSION['id'];
				$name=$_SESSION['name'];
				$password=$_SESSION['password'];
				$email=$_SESSION['email'];
				
				// echo @$id." ".@$name." ".@$password." ".@$email;
			}
			echo "<script>window.location.replace('index.php')</script>";				
		}
		else
		{
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Wrong data insert!</strong> You Are Not login Please Change name & password.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>'	;
		}
	}
?>

<!-- Header -->
<?php
	include 'header.php';
?>
	<!-- Header Part  End -->
	<br><br>
	
<!-- Login -->
		<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <h3>Login here</h3>
                <br>
                <form>
                    <input type="email" name="username" class="form-control col-md-6" placeholder="Enter E-mail... " autocomplete="off"/><br>
                    <!-- <input type="password" name="password" class="form-control col-md-6" placeholder="Password" autocomplete="off"/><br> -->
					<input placeholder="password" class="form-control col-md-6" name="password" type="password"  autocomplete="off" required id="myInput">
					<br>
					<input id="check3" name="check3" type="checkbox"  value="show password" onClick="myfunction()">
           			 <label> show password</label><br><br>
                    <button type="submit" name="bt2" class="btn btn-primary col-md-6">Login</button>
                </form>
            </div>            
        </div>
    </div>
	<!-- login end -->
	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<script>
				function myfunction()
				{
					var x=document.getElementById("myInput");
					if(x.type=="password")
					{
						x.type="text";
					}
					else
					{
						x.type="password";
					}
				}
		</script>
</body>
</html>
<!-- footer -->
<?php
	include 'footer.php';
?>

