
<!-- Header -->
<?php
	include "config.php";
	include 'header.php';
	if(!isset($_SESSION['name']))
	{
		echo "<script>window.location.replace('login.php')</script>";		
	}
?>
<div class="container" style="margin-top: 80px; margin-bottom:200px;">

<h1 class="text-center title-color" style="font-weight:bold; font-size:50px;">THANK YOU...</h1>
<center>
<P class="text-center" style="font-weight:bold; font-size:30px;">
<?php echo $_SESSION['name'];?>,
</center>
</p>
<P class="text-center" style="font-weight:bold; font-size:30px;"> We Have Recive Your Order</P>


<center>
 <a href="my-orders.php">
<button name="submit" type="submit" class="btn" style="background-color:#f7444e;color:white;"> View-Orders </button>  
</center> </a>
</div>
<!-- footer -->
<?php
	include 'footer.php';
?>
