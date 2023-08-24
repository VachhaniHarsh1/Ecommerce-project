
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

//========================= View Product ============================
	
	$item=3;
	$pagi=mysqli_query($conn,"select count(*) as harsh from ecomadinprd");
	$coun=mysqli_fetch_array($pagi);
	$tot=$coun['harsh'];
	// echo @$tot;
	
	$page=ceil($tot/$item);
	// echo @$page;
	
	if(isset($_REQUEST['k']))
	{
		$page_count=$_REQUEST['k'];
	}else
	{
		$page_count=1;
	}
	$k=($page_count-1)*$item;
	$rec = mysqli_query($conn,"select * from ecomadinprd join ecomadincat on ecomadinprd.catid = ecomadincat.tid limit $k,$item")or die("Select Product Error".mysqli_error($conn));
	
	echo "<table border='2' cellpadding='15' align='center' style='background-color:white'>";
	
	echo "<tr><th>Id</th><th>catid</th><th>Brand Name</th><th>Model Name</th><th>Price</th><th>Stock</th><th>Screen Size</th><th>Hard Disk Size</th><th>CPU Speed</th><th>Operating System</th><th>Image</th><th>Update</th><th>Delete</th></tr>";
	
	while($red=mysqli_fetch_array($rec))
	{
		echo "<tr>";
			echo "<td>".$red['prdid']."</td>";
			echo "<td>".$red['catid']."</td>";
			echo "<td>".$red['bname']."</td>";
			echo "<td>".$red['mname']."</td>";
			echo "<td>".$red['price']."</td>";
			echo "<td>".$red['stock']."</td>";
			echo "<td>".$red['ssize']."</td>";
			echo "<td>".$red['hdsize']."</td>";
			echo "<td>".$red['cpspeed']."</td>";
			echo "<td>".$red['opsystem']."</td>";
			echo "<td><img src=".$red['img1']." width=80 height=60></td>";			
			echo "<td><a href='insertproduct.php?mid=".$red['prdid']."'>Update</a></td>";
			echo "<td><a href='viewproduct.php?mid=".$red['prdid']."&dlt-img=".$red['img1']."' onclick='return chk();'>Delete</a></td>";
		echo "</tr>";
	}
	
	echo "</table>";
	
//========================= Delete Product ==========================
	
	if(isset($_REQUEST['mid']))
	{
		$prdid= $_REQUEST['mid'];
		unlink($_REQUEST['dlt-img']);
		mysqli_query($conn,"delete from ecomadinprd where prdid='$prdid'")or die("Delete Error".mysqli_error($conn));
	}
?>
<br>
<html>
<head>
<style>
.center {
  text-align: center;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</head>
<body>

<div class="center">
  <div class="pagination">
  <?php
	if($page_count > 1)
	{
		echo '<a href="viewproduct.php?k='.($page_count-1).'">&laquo;</a>';
	}
		for($i=1;$i<=$page;$i++)
		{
			echo '<a href="viewproduct.php?k='.$i.'">'.@$i.'</a>';	
		}
		
	if($page > $page_count)
	{
		echo '<a href="viewproduct.php?k='.($page_count+1).'">&raquo;</a>';
	}
	?>	
	  
  </div>
</div>
</body>
	<script>
		function chk()
		{
			return confirm("Are You Sure???");
		}
	</script>
</html>