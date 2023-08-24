
	<!-- Header -->
	<?php
	include "config.php";
	include 'header.php';
    if(!isset($_SESSION['name']))
	{
		echo "<script>window.location.replace('login.php')</script>";		
	}
    if(isset($_REQUEST['btn1']))
    {
        $uid=$_SESSION['id'];
        $select = mysqli_query($conn,"select * from ecomcart where uid='$uid'")or die("select error cart".mysqli_error($conn));

        while($red=mysqli_fetch_array($select))
        {
            $pid = $red['pid']; // FETACH ALL PID OF ACTIVE USER 
            $email=$_REQUEST['email'];
            $number=$_REQUEST['number'];
            $address=$_REQUEST['address'];  
            date_default_timezone_set("Asia/Kolkata");
            $datetime = date("Y-m-d h:i:s");

            // INSERTING RECORD INTO ORDER TABLE 
            $insert = mysqli_query($conn,"INSERT INTO prdorder SET uid='$uid',
            pid='$pid',email='$email',monumber='$number',address='$address',datetime1='$datetime'") or die("insert:error");

             // REMOVING DATA FROM CART TABLE
             $delete = mysqli_query($conn,"DELETE FROM ecomcart WHERE pid='$pid' AND uid='$uid'");
        }
        header("location:order-confirm.php");
    }
	?>
	
	<!-- Header Part  End -->
	<br><br>
	<!-- product detail-->
		<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <h3>Enter Detail</h3>
                <br>
                <form>                
                    <input type="text" name="email" autocomplete="off" required class="form-control col-md-9" placeholder="Enter E-mail..."/><br>
                    <input type="text" autocomplete="off" required name="number" class="form-control col-md-9" placeholder="Enter Mobile No..."/><br>
                    <textarea rows="3"  name="address" autocomplete="off" required class="form-control col-md-9" placeholder="Address..."></textarea><br>
                    <button type="submit" name="btn1" class="btn btn-success col-md-9">Confirm</button>
                </form>
            </div>
        </div>
    </div>
	<!-- product detail end-->

	
<!-- footer -->
		<?php
	include 'footer.php';
	?>
