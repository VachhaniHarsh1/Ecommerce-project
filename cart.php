
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Header -->
	<?php
	include "config.php";
	include 'header.php';
	if(!isset($_SESSION['name']))
	{
		echo "<script>window.location.replace('login.php')</script>";		
	}
	//delete cart data
	if(isset($_REQUEST['cartid']))
	{
  	   $cartid = $_REQUEST['cartid'];

       $delete = mysqli_query($conn,"DELETE FROM ecomcart WHERE id='$cartid'");
  	   echo "<script> alert('Item Removed'); </script>";
  	   echo "<script> window.location.replace('cart.php'); </script> ";
	}
	?>
	<!-- IF CART IS EMPTY -->

<?php

if(@$_SESSION['cartcount']==0)
{ 
?>

<div class="container" style="margin-top: 80px; margin-bottom:200px;">

<P class="text-center" style="font-weight:bold; font-size:30px;"> 
Your Cart is Empty</P>

<center>
<i class="fa fa-shopping-cart fa-cart-arrow-down" style="font-size:48px;color:f7444e;margin:20px 0px 20px;"></i>
</center>

<center> <a href="index.php">
<button name="submit" type="submit" class="btn" style="background-color:f7444e;color:white;"> Shop Now </button>  
</center> </a>
</div>

<?php  } ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Document</title>
	</head>
	<body>
		
	</body>
	</html>
	<!-- Header Part  End -->
	<br><br>
	 <!-------------Template center part start--------->
	<?php
					
		if(isset($_SESSION['name']))
		{	
			$uid = $_SESSION['id'];
			// echo @$uid;
			$rec = mysqli_query($conn,"SELECT * FROM ecomcart JOIN ecomadinprd ON ecomcart.pid=ecomadinprd.prdid 
			 ");
		
			// $rec = mysqli_query($conn,"select * from ecomcart")or die("Select Product Error".mysqli_error($conn));
			
			$dar=mysqli_num_rows($rec);						
			
			while($red=mysqli_fetch_array($rec))
			{					
				if($red['uid'] === $_SESSION['id'])
				{	
	?>
	<div class="container" style="margin: 50px auto 80px; padding:10px 0px 30px; border:solid 10px black;" >
		<div class="row">

			<div class="col-lg-3 col-md-4 col-sm-12 col-12">
				<!-- PRRODUCT IMAGES-->
				<?= " <img src=admin/".$red['img1']." style='height:200px;'class='center img-fluid img-thumbnail'> "?>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-10 offset-sm-2 col-10 offset-2">
				<!-- PRODUCT TITLE -->
				<p class="title">
					<h1 style="background-color: green; color: white; display: inline-block;"><?= $red['bname']." ".$red['mname']?></h1>
				</p>
			<p>
              <?= $red['ssize']." Inch, ".$red['hdsize']."Hard Disk,".$red['cpspeed']." CPU Speed,".$red['opsystem']?>
            </p>
			<!--PRICE -->
			<div class="price">
                <h5><p>Price : &#8377; <?= $red['price']; ?></h5> 
          	</div>
		   	<!--STOCK -->
           	<div class="price">
                <b><p>AVALIBALITY : <?= $red['stock']; ?>  </p></b>
           	</div>
			<br>
           <!--BUTTONS -->
           <?php  echo "<a href='cart.php?cartid=".$red['id']."'
            onclick='return delete1();'>  ";?>
			<button type="button"  class="btn btn-success" style="font-size:24px"> <i  style="color:red" class="material-icons">delete</i> Delete</button>
           </a>
      </div>
    </div>
</div>					
	<?php		
		}
			}			
				}else
				{
					echo "please Login First";
				}
	?>
	<!-- TOTAL OF PRODUCTS AND ITEMS -->
<?php

$result1 = mysqli_query($conn,"SELECT SUM(price)FROM ecomcart JOIN ecomadinprd ON ecomcart.pid=ecomadinprd.prdid 
WHERE uid=$uid ");

 $record1 = mysqli_fetch_array($result1);
 $tot_price = $record1['0'];

?>


<!-- PRICE DETAILS START -->

<?php

if(@$_SESSION['cartcount']!==0)
{ 
?>

<div class="container" style="margin: 50px auto 80px;   
padding:10px 0px 30px; width:400px;
border:solid 1px black;" >

<div class="row">

	<div class="col-lg-6 offset-1 col-md-6 col-sm12 col-12">

	<h2 style="font-size: 25px; margin:5px 0px 5px">
	<span style="color:#f7444e;">PRICE-DETAILS</span></h2>

	</div>

	<div class="col-lg-12  col-md-12 col-sm-12 col-12">
	<hr style="height:2px;border-width:0;color:gray;background-color:gray">
	</div>

	<div class="col-lg-8 offset-1 col-md-8 col-sm-12 col-12">
	<b><p class="price">Total Amount : &#8377;  <?php echo @$tot_price; ?> 
	  <p class="price"> Total Items : <?php echo $_SESSION['cartcount']; ?> </p></b>
	</div> 

	<div class="col-lg-12  col-md-12 col-sm-12 col-12">
	<hr style="height:2px;border-width:0;color:gray;background-color:gray">
	</div>

	<div class="col-lg-12  col-md-12 col-sm-12 col-12">

	  <!-- PASS TO ORDER PAGE -->
	  <a href="order.php">
	  <center>
	  <button type="button" class="btn btn-success"> 
		  Place Order
	  </button>
	  </center>
	  </a>

	</div>


 </div>

</div>
<?php } ?>

<!-- PRICE DETAILS OVER -->	               
    <br><br><br>
    <!-------------Template centter part end---------->

	<!-- delete cart iteam -->
    <script> 

          function delete1()
          {
            return confirm("Sure To Remove Item");
          }
    </script>
<!-- footer -->
		<?php
	include 'footer.php';
	?>
