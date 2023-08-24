
<?php
	include "config.php";
	include 'header.php';
	
	//========================= Insert Category =======================================
	if(@$_REQUEST['btn1'] == 'Insert')
	{
		// $inid = $_REQUEST['tid'];
		$incat = $_REQUEST['catid'];	
		mysqli_query($conn,"insert into ecomadincat set catid='$incat'")or die("Insert Id Category Error".mysqli_error($conn));
		header("location:viewcat.php");
	}
	
	//=============================  Update Category ====================================
	
	if(isset($_REQUEST['mid']))
	{
		$tid=$_REQUEST['mid'];
		// echo @$tid;
		
		$rec = mysqli_query($conn,"select * from ecomadincat where tid='$tid'")or die("Update Category Error".mysqli_error($conn));
		
		$res=mysqli_fetch_array($rec);
	}
	if(@$_REQUEST['btn1'] == 'Update')
	{
		$tid=$_REQUEST['xid'];
		$catid=$_REQUEST['catid'];
		// echo  @$tid,@$catid;
		mysqli_query($conn,"update ecomadincat set catid='$catid' where tid='$tid'")or die("Update Category Error".mysqli_error($conn));
		
		header('location:viewcat.php');
	}
	
?>
    <!--------Menu----------->
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
<html>
	<head>
	</head>
	<body>
		<form method="post">
			<table border='5' cellpadding='15' align='center' style='background-color:white'>		
			<input type="hidden" name="xid" value="<?php echo @$res['tid']; ?>">
				<tr>
					<td>Insert Id</td>
					<td><input type="text" name="tid" disabled></td>
				</tr>				
				<tr>
					<td>Insert Category</td>
					<td><input type="text" name="catid" autocomplete="off" value="<?php echo @$res['catid']; ?>"></td>
				</tr>
				<tr>
					<td colspan='2' align='center'>
						<input type="submit" name="btn1" value="<?php if(isset($_REQUEST['mid'])) echo 'Update'; else echo 'Insert'; ?>">
					</td>
				</tr>
			</table>
		</form>
	</body>
</head>
</html>
<br>
