
<!-- Header -->
<?php
include "config.php";
include 'header.php';
if(!isset($_SESSION['name']))
	{
		echo "<script>window.location.replace('login.php')</script>";		
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- TITLE MY CART -->
  <center>
    <h2 style="font-size: 45px; margin:30px 0px 20px"><span style="color:#f7444e;">MY-ORDERS</span></h2>
  </center>

  <hr style="height:2px;border-width:0;color:gray;background-color:gray">

  <?php
  $uid = $_SESSION['id'];
  // echo @$uid;

  $select = mysqli_query($conn, "select * from prdorder join ecomadinprd on prdorder.pid=ecomadinprd.prdid where uid='$uid'") or die("my order select error" . mysqli_error($conn));

  while ($record = mysqli_fetch_array($select)) {
  ?>
    <div class="container" style="margin: 50px auto 80px; padding:10px 0px 30px;
      border:solid 10px black;">

      <div class="row">

        <div class="col-lg-3 col-md-4 col-sm12 col-12">
          <!-- PRRODUCT IMAGES-->
          <?= " <img src=admin/" . $record['img1'] . " style='height:200px;'class='center'> " ?>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-10 offset-sm-2 col-10 offset-2">

          <!-- PRODUCT TITLE -->
          <p class="title">
          <h1 style="background-color: green; color: white; display: inline-block;"><?= $record['bname'] . " " . $record['mname']; ?></h1>
          </p>

          <!--PRICE -->
          <b>
            <div class="price">
              <p>Price : &#8377; <?= $record['price']; ?>
            </div>

            <!--ADDRESS -->
            <div class="price">
              <p>Deliver At : <?= $record['address']; ?>
            </div>

            <!--Number -->
            <div class="price">
              <p>Order Number : <?= $record['monumber']; ?>
            </div>

            <!--DATE -->
            <div class="price">
              <p>Order Date : <?= $record['datetime1']; ?>
            </div>
          </b>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <?php
  $select = mysqli_query($conn, "select * from prdorder where uid='$uid'");

  while ($record = mysqli_fetch_array($select)) {
    if ($record['uid'] !== $uid) {
      $var = 0;
    } else {
      $var = 1;
    }
  }
  if (isset($var) == 0) {
  ?>

    <div class="container" style="margin-top: 80px; margin-bottom:200px;">

      <P class="text-center" style="font-weight:bold; font-size:30px;">
        Your Don't Have Any Order</P>

      <center>
        <span class='fas fa-cart-arrow-down' style='font-size:60px; 
margin:20px 0px 10px; color:#f7444e; '></span>
      </center>

      <center> <a href="index.php">
          <button name="submit" type="submit" class="btn" style="background-color:#f7444e;color:white;"> Shop Now </button>
      </center> </a>
    </div>


  <?php } ?>
  <!-- BILL  -->

  <?php

  $result11 = mysqli_query($conn, "SELECT SUM(price)FROM prdorder JOIN ecomadinprd ON prdorder.pid=ecomadinprd.prdid 
WHERE uid=$uid ");

  $record11 = mysqli_fetch_array($result11);
  $tot_price = $record11['0'];


  //TOTAL ITEMS
  $select2 =  mysqli_query($conn, "SELECT COUNT(uid) FROM prdorder WHERE uid='$uid'");
  $record2 = mysqli_fetch_array($select2);

  $tot_itmes = $record2['0'];
  ?>
  <div class="container" style="margin: 50px auto 80px;   
padding:10px 0px 30px; width:400px;
border:solid 1px black;" id="bill">

    <div class="row">

      <div class="col-lg-6 offset-1 col-md-6 col-sm12 col-12">

        <h2 style="font-size: 25px; margin:5px 0px 5px">
          <span style="color:#f7444e;">PRICE-DETAILS</span>
        </h2>

      </div>

      <div class="col-lg-12  col-md-12 col-sm-12 col-12">
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
      </div>

      <b>
        <div class="col-lg-8 offset-1 col-md-8 col-sm-12 col-12">
          <p class="price">Total Amount : &#8377; <?php echo @$tot_price; ?>
          <p class="price"> Total Items : <?php echo $tot_itmes; ?> </p>
      </b>
    </div>

    <div class="col-lg-12  col-md-12 col-sm-12 col-12">
      <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    </div>

    <div class="col-lg-12  col-md-12 col-sm-12 col-12">
      <!-- PASS TO ORDER PAGE -->
      <a href="index.php">
        <center>
          <button type="button" class="btn btn-success">
            DONE
          </button>
        </center>
      </a>
    </div>
  </div>
  </div>
</body>

</html>
<!-- footer -->
<?php
include 'footer.php';
?>