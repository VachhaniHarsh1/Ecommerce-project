<?php
	include "config.php";
	session_start();
	if(!isset($_SESSION['nam']))
	{
		echo "<script>window.location.replace('index.php')</script>";		
	}
?>
<html>
    <head><title>Admin || Home</title></head>
    <link rel="stylesheet" href="homes.css" type="text/css"/>
    
<body>
    <!--------Wrapper--------->
<div class="wrp">
    <!--------Header---------->
<div class="hdr">
        <div class="adminp">E-commerce Admin Panel
			<div class="logout">			
				<button type="submit" name="bt1" class="btn btn-success"><a href="logout.php" style="text-decoration:none; color:white;">Logout</a></button>			
			</div>
        </div>
</div>

</body>
</html>
