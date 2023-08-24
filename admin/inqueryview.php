
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

	//========================= Inquery View ========================
	
	$rec = mysqli_query($conn,"select * from inquirydata")or die("Inquery error".mysqli_error($conn));
	
	echo "<table border='2' cellpadding='15' align='center' style='background-color:white'>";
	
	echo "<tr><th>Id</th><th>User Name</th><th>User Eamil</th><th>user number</th><th>User Inquery</th><th>Delete</th></tr>";

	while($red=mysqli_fetch_array($rec))
	{		
		echo "<tr>";
			echo "<td>".$red['id']."</td>";
			echo "<td>".$red['name']."</td>";
			echo "<td>".$red['email']."</td>";
			echo "<td>".$red['number']."</td>";
			echo "<td>".$red['address']."</td>";
			echo "<td><a href='inqueryview.php?mid=".$red['id']."' onclick='return chk();'>Delete</a></td>";
		echo "</tr>";
	}
	
	echo "</table>";
	
	//===================== Delete Inquery  ========================
	if(isset($_REQUEST['mid']))
	{
		$prdid=$_REQUEST['mid'];
		// echo @$prdid;
		mysqli_query($conn,"delete from inquirydata where id='$prdid'")or die("Delete Inquery error".mysqli_error($conn));
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
			return confirm("are you sure");
		}
	</script>
</html>
