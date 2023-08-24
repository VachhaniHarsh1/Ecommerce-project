<?php
	include 'header.php';
	include "config.php";
  error_reporting(0);
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php
     $limit=2;
     if(@$_REQUEST['page'])
     {  
        $pgno = $_REQUEST['page'];
        $offset=($pgno - 1) * $limit ;
     }
     else{
          // $offset=1;
         $offset=(1 - 1) * $limit ;
     }

     $result = mysqli_query($conn,"SELECT * FROM prdorder JOIN ecomadinprd ON prdorder.pid=ecomadinprd.prdid limit $offset,$limit");

     echo "<table border='2' cellpadding='15' align='center' style='background-color:white'>";
	
	echo "<tr><th>Oid</th><th>Uid</th><th>Pid</th><th> Product Name</th><th> PRICE</th><th> DETAILS</th><th> Address</th><th> Pmode</th><th> Order-Date</th><th> P-Img</th><th>Confirm order</th></th></tr>";
	
	while($record = mysqli_fetch_array($result))
    {
		echo "<tr>";
                 echo "<th>" . $record['oid'] . "</th>";
                 echo "<th>" . $record['pid'] . "</th>";
                 echo "<th>" . $record['uid'] . "</th>";
                 echo "<th>" . $record['bname'] . "</th>";
                 echo "<th>" . $record['price'] . "</th>"; 
                 echo "<th>" . $record['mname'].$record['ssize'].$record['hdsize'].$record['opsystem']. "</th>";
                 echo "<th>" . $record['address'] . "</th>";
                 echo "<th>" . $record['monumber'] . "</th>";
                 echo "<th>" . $record['datetime1'] . "</th>";
                 echo "<th> <img src=".$record['img1']." width=100px;> </th>";
                 echo "<td><button><a href='clientorder.php?mid=".$record['oid']."&dlt-img=".$record['img1']."'>Confirm</a></button></td>";       

                 echo "</tr>";
		echo "</tr>";
	}
    echo "</table>";
    //========================= Delete Product ==========================
	
	if(isset($_REQUEST['mid']))
	{
    $prdid= $_REQUEST['mid'];
		unlink($_REQUEST['dlt-img']);
		mysqli_query($conn,"delete from prdorder where oid='$prdid'")or die("Delete Error".mysqli_error($conn));
    header("Location: clientorder.php");
	}
	?>
  <br>
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
  $result1=mysqli_query($conn,"select * from prdorder");
  if(mysqli_num_rows($result1)>0)
  {
    $total_records=mysqli_num_rows($result1);
    $total_page=ceil($total_records/$limit);
    if($offset > 1)
  	{
	  	echo '<a href="clientorder.php?page='.($offset-1).'">&laquo;</a>';
  	}
    for($i=1;$i<=$total_page;$i++)
    {
      echo '<a href="clientorder.php?page='.$i.'">'.@$i.'</a>';	
    }
    if($total_page > $offset)
    {
      echo '<a href="clientorder.php?page='.($offset+1).'">&raquo;</a>';
    }
  }
	?>	  
  </div>
</div><br>
     </body>
</html>