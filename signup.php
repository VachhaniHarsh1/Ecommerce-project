
	<!-- Header -->
<?php
	include "config.php";
	include 'header.php';
	
	if(isset($_REQUEST['btn1']))
	{
		$name=$_REQUEST['name'];
		$password=$_REQUEST['password'];
		$email=$_REQUEST['email'];
		$mobile=$_REQUEST['mobile'];
		$address=$_REQUEST['address'];
		
		$result=mysqli_query($conn,"select * from registrationclient where email='$email'")or die("Registration errror".mysqli_error($conn));
		$num=mysqli_fetch_array($result);
		if($num > 0)
		{
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Eamil Already Exists!</strong> You Are Not Signup Please Change Email.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>'	;
		}
		else
		{
			mysqli_query($conn,"insert into registrationclient set name='$name', password='$password',email='$email', mobile='$mobile', address='$address'");
			header('location:index.php');
		}		
	}
?>
	
	<!-- Header Part  End -->
	<br><br>
	<!-- signup-->
		<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <h3>Signup here</h3>
                <br>
                <form method="post">
                    <input type="text" class="form-control col-md-9" name="name" placeholder="Enter Name..." autocomplete="off" required /><br>
					<input type="password" class="form-control col-md-9" name="password" placeholder="Enter Password..." autocomplete="off" required /><br>
                    <input type="email" class="form-control col-md-9" name="email" placeholder="Enter E-mail..." autocomplete="off" required /><br>
                    <input type="text" class="form-control col-md-9" maxlength="10" name="mobile" placeholder="Enter Mobile No..." autocomplete="off" required /><br>
                    <textarea rows="3" class="form-control col-md-9" name="address" placeholder="Address..." autocomplete="off" required ></textarea><br>
                    <button type="submit" name="btn1" class="btn btn-success col-md-9">Signup</button>
                </form>
            </div>
        </div>
    </div>
	<!-- signup end-->

	
<!-- footer -->
		<?php
	include 'footer.php';
	?>
 