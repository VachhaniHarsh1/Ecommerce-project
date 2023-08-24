
<?php
	include 'header.php';
	include "config.php";	
?>
 <!--------Menu----------->
    <div class="menu">
        <div class="navbar">
            <div class="navbar">
                <a href="home.php">Home</a>     
                <div class="dropdown">
                  <button class="dropbtn">Category 
                    <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content">
                    <a href="insertcat.php">Insert Category </a>
                    <a href="viewcat.php">View Category</a>                   
                  </div>
                </div>
                
                <div class="dropdown">
                    <button class="dropbtn">Product 
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="insertproduct.php">Insert Product</a>
                      <a href="viewproduct.php">View Product</a>            
                    </div>
                </div>  

				<div>
					<a href="registrationclient.php">Registration user</a>  
				</div>
				<div>
					<a href="inqueryview.php">Inquery View</a>  
				</div>
				<div>
					<a href="clientorder.php">Client Order</a>  
				</div>
            </div>         
        </div>
    </div>
<br><br>
<?php

//========================= View client ============================
	
	$rec = mysqli_query($conn,"select * from registrationclient")or die("Select Product Error".mysqli_error($conn));
	
	echo "<table border='2' cellpadding='15' align='center' style='background-color:white'>";
	
	echo "<tr><th>Id</th><th>User Name</th><th>User Password</th><th>User Email</th><th>User MobileNo</th><th>User Address</th><th>Delete</th></tr>";
	
	while($red=mysqli_fetch_array($rec))
	{
		echo "<tr>";
			echo "<td>".$red['id']."</td>";
			echo "<td>".$red['name']."</td>";
			echo "<td>".$red['password']."</td>";
			echo "<td>".$red['email']."</td>";
			echo "<td>".$red['mobile']."</td>";
			echo "<td>".$red['address']."</td>";
			echo "<td><a href='registrationclient.php?mid=".$red['id']."' onclick='return chk();'>Delete</a></td>";			
		echo "</tr>";
	}
	
	echo "</table>";
	
	//========================= Delete client ==========================
	
	if(isset($_REQUEST['mid']))
	{
		$prdid= $_REQUEST['mid'];		
		mysqli_query($conn,"delete from registrationclient where id='$prdid'")or die("Delete Error".mysqli_error($conn));
	}
?>
<br>
<html>
	<head>
	</head>
	<body>		
	</body>
	<script>
		function chk()
		{
			return confirm("Are You Sure???");
		}
	</script>
</html>