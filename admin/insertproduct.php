
<?php
	include 'header.php';
	include "config.php";
	
	//======================== Insert Product ===================================
	
	if(@$_REQUEST['btn1'] == "Insert")
	{
		$catid = $_REQUEST['catid'];
		// echo @$catid;
		$bname = $_REQUEST['bname'];
		$mname = $_REQUEST['mname'];
		$price = $_REQUEST['price'];
		$stock = $_REQUEST['stock'];
		$ssize = $_REQUEST['ssize'];
		$hdsize = $_REQUEST['hdsize'];
		$cpspeed = $_REQUEST['cpspeed'];
		$opsystem = $_REQUEST['opsystem'];
		$img1 = "dimg/".$_FILES['img1']['name'];
		move_uploaded_file($_FILES['img1']['tmp_name'],$img1);			
		
		mysqli_query($conn,"insert into ecomadinprd set catid='$catid', bname='$bname', mname='$mname',price='$price',stock='$stock', ssize='$ssize', hdsize='$hdsize', cpspeed='$cpspeed', opsystem='$opsystem', img1='$img1' ");
			
		header('location:viewproduct.php');
		
	}
	//======================== Update Product ===================================
	
	if(isset($_REQUEST['mid']))
	{
		$prdid= $_REQUEST['mid'];
		// echo @$prdid;
		
		$rec = mysqli_query($conn,"select * from ecomadinprd where prdid=$prdid")or die("Update product error".mysqli_error($conn));
		
		$res = mysqli_fetch_array($rec);
	}
	if(@$_REQUEST['btn1'] == "Update")
	{
		$prdid= $_REQUEST['xid'];
		$catid = $_REQUEST['catid'];	
		// echo @$catid;
		$bname = $_REQUEST['bname'];
		$mname = $_REQUEST['mname'];
		$price = $_REQUEST['price'];
		$stock = $_REQUEST['stock'];
		$ssize = $_REQUEST['ssize'];
		$hdsize = $_REQUEST['hdsize'];
		$cpspeed = $_REQUEST['cpspeed'];
		$opsystem = $_REQUEST['opsystem'];
		$photos=$_REQUEST['oimg'];
		if($_FILES['img1']['name'] != "")
		{
			$photos="dimg/".$_FILES['img1']['name'];
			move_uploaded_file($_FILES['img1']['tmp_name'],$photos);
			unlink($_REQUEST['oimg']);
		}
		
		mysqli_query($conn,"update ecomadinprd set catid='$catid',bname='$bname', mname='$mname',price='$price',stock='$stock', ssize='$ssize', hdsize='$hdsize', cpspeed='$cpspeed', opsystem='$opsystem', img1='$photos' where prdid='$prdid'");
		
		header('location:viewproduct.php');
	}
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
<html>
	<head>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			<table border='5' cellpadding='15' align='center' style='background-color:white'>
			<input type="hidden" name="xid" value="<?php echo @$res['prdid'];?>"> 
			<input type="hidden" name="oimg" value="<?php echo @$res['img1'];?>">
			
				
				 <tr>
					<td>	
						Select Category
					</td>
					<td>
					<select required  id="drpdata" onchange="abc();">
							<option selected disabled>Select</option>
					<?php 						
						$rec1 = mysqli_query($conn,"select * from ecomadincat")or die("Update product error".mysqli_error($conn));	
							
						while($red1=mysqli_fetch_array($rec1))
						{
					?>								
						<option value="<?php echo @$red1['catid']; ?>"
						<?php if(@$res['catid']==@$red1['tid']){echo "selected";}?>>
						<?php echo @$red1['catid'];?></option>
					<?php } ?>
					</select>
					</td>
				</tr>
					<tr>
					<td>
						category id
					</td>
					<td>
						<input readonly type="text" id="catid" name="catid" autocomplete="off" value="<?php echo @$res['catid'];?>">
					</td>
				</tr>
				
				<tr>
					<td>
						Brand Name
					</td>
					<td>
						<input type="text" name="bname" autocomplete="off" value="<?php echo @$res['bname'];?>">
					</td>
				</tr>
				<tr>
					<td>
						Model Name
					</td>
					<td>
						<input type="text" name="mname" autocomplete="off" value="<?php echo @$res['mname'];?>">
					</td>
				</tr>
				<tr>
					<td>
						Price:
					</td>
					<td>
						<input type="text" name="price" value="<?php echo @$res['price']; ?>" class="form-control placeholder-text" /> 
					</td>
				</tr>
				<tr>
					<td>	
						Stock :
					</td>
					<td>					
    				<input type="radio" name="stock" value="In-Stock" <?php if(@$res['stock']=='In-Stock'){echo 'checked';} ?> />In-Stock
        			
        			<input type="radio" name="stock" value="out of stock" <?php if(@$res['stock']=='out of stock') {echo 'checked';} ?> />Out of Stock	 <br> <br>
					</td>
				</tr>
				<tr>
					<td>	
						Screen Size
					</td>
					<td>
						<input type="text" name="ssize" autocomplete="off" value="<?php echo @$res['ssize'];?>">
					</td>
				</tr>
				
				<tr>
					<td>
						Hard Disk Size
					</td>
					<td>
						<input type="text" name="hdsize" autocomplete="off" value="<?php echo @$res['hdsize'];?>">
					</td>
				</tr>
				<tr>
					<td>
						CPU Speed
					</td>
					<td>
						<input type="text" name="cpspeed" autocomplete="off" value="<?php echo @$res['cpspeed'];?>">
					</td>
				</tr>
				<tr>
					<td>	
						Operating System
					</td>
					<td>
						<input type="text" name="opsystem" autocomplete="off" value="<?php echo @$res['opsystem'];?>">
					</td>
				</tr>
				
				<tr>
					<td>	
						Image
					</td>
					<td>
						<input type="file" name="img1">
					</td>
				</tr>
				<tr>
					<td colspan='2' align='center'>
					<input type="submit" name="btn1" value="<?php if(isset($_REQUEST['mid'])) echo 'Update'; else echo 'Insert';?>">
					</td>
				</tr>
			</table>
		</form>
		<script>
			function abc()
			{
				datagets = document.getElementById("drpdata").value;
				// alert(datagets);
				
				xmlobj = new XMLHttpRequest();
				
				xmlobj.open("GET","ajax1.php?nm="+datagets,false);
				xmlobj.send();
				
				document.getElementById('catid').value=xmlobj.responseText;
			}
		</script>
	</body>
</html>
<br>