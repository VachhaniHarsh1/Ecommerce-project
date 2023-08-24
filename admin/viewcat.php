
<?php
	include "config.php";
	include 'header.php';
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

		//========================= Delete Category =============================
	
	if(isset($_REQUEST['mid']))
	{
		$tid=$_REQUEST['mid'];
		mysqli_query($conn,"delete from ecomadincat where tid='$tid'")or die("Delete Error Category".mysqli_error($conn));
	}
	
	//======================= Select Data ===================================
	
	$rec = mysqli_query($conn,"select * from ecomadincat")or die("Select Category Error".mysqli_error($conn));	
	
	echo "<table border='5' cellpadding='15' align='center' style='background-color:white'>";
		echo "<tr>";
			echo "<th>Category Id</th>";
			echo "<th>Category Name</th>";								
			echo "<th>Update</th>";
			echo "<th>Delete</th>";
		echo "</tr>";
				
	while($red=mysqli_fetch_array($rec))
	{
		echo "<tr>";
		echo "<td>".$red['tid']."</td>";
		echo "<td>".$red['catid']."</td>";
		echo "<td><a href='insertcat.php?mid=".$red['tid']."'>Update</a></td>";
		echo "<td><a href='viewcat.php?mid=".$red['tid']."' onclick='return chk();'>Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>";
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