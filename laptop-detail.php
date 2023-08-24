
	<!-- Header -->
	<?php
	include 'header.php';
	include "config.php";
	?>
	<!-- Header Part  End -->
	<br><br>
	
<!-- Mai9n Part -->
	
    <div class="container">
        <div class="row">
		<?php
			
			if(isset($_REQUEST['mid'])){
			$prdid= $_REQUEST['mid'];
			// echo @$prdid;
		
			$rec = mysqli_query($conn,"select * from ecomadinprd where prdid=$prdid")or die("Update product error".mysqli_error($conn));		
		
			
			while($res=mysqli_fetch_array($rec))
			{	
			?>
            <div class="col-md-6">
                <img src= admin/<?php echo $res['img1'] ?> class='img-fluid img-thumbnail'  style='width:100%; height:150;'>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php echo $res['bname']."&nbsp;".$res['mname']  ?></h2>
                    </div>
                </div>
                
				<br>
				<div class="row">
					<div class="col-md-12">
						<h5 class="text-justify">Product Details :-</h5>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<h6 class="text-justify">Brand Name :-</h6>
					</div>

					<div class="col-md-1">
						<h6 class="text-justify"><?php echo $res['bname']?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h6 class="text-justify">Model Name :-</h6>
					</div>

					<div class="col-md-7">
						<h6 class="text-justify"><?php echo $res['mname']?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h6 class="text-justify">Screen Size :-</h6>
					</div>

					<div class="col-md-7">
						<h6 class="text-justify"><?php echo $res['ssize']?></h6>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<h6 class="text-justify">Hard Disk Size :-</h6>
					</div>

					<div class="col-md-4">
						<h6 class="text-justify"><?php echo $res['hdsize']?></h6>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<h6 class="text-justify">CPU Speed :-</h6>
					</div>

					<div class="col-md-4">
						<h6 class="text-justify"><?php echo $res['cpspeed'] ?></h6>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<h6 class="text-justify">Operating System :-</h6>
					</div>

					<div class="col-md-4">
						<h6 class="text-justify"><?php echo $res['opsystem'] ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h6 class="text-justify">Price :-</h6>
					</div>

					<div class="col-md-7">
						<h6 class="text-justify">&#8377; <?php echo $res['price']?></h6>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-3">
						<form method="post">
					
						 <?php
							if(isset($_SESSION['name']))
							{
								if(isset($_REQUEST['btn3']))
								{	
									$pid=$_REQUEST['pid'];
									$uid=$_REQUEST['uid'];
									// echo @$pid,@$uid;
									
									mysqli_query($conn,"insert into ecomcart set pid='$pid', uid='$uid'");
									echo "<script>window.location.replace('cart.php')</script>";
								}
							?>
							<input type="hidden"  name="pid" value="<?php echo @$prdid; ?>"><br>
							<input type="hidden" name="uid" value="<?php echo $_SESSION['id']; ?>"><br>
							<input type="hidden"  value="<?php echo $_SESSION['name']; ?>">
							<?php
							}
							else
							{
								if(isset($_REQUEST['btn3']))
								{	
									echo "<script>window.location.replace('login.php')</script>";							
								}								
							}
						?>
							
							<button type="submit" name="btn3" class="btn btn-success">Add to cart</button>
						</form>
					</div>
				</div>
            </div>
		<?php 
		}
		}
		?>
        </div>
    </div>
    <br><br><br><br><br>
<!-- End mail part-->
	
<!-- footer -->
	<?php
	include 'footer.php';
	?>
