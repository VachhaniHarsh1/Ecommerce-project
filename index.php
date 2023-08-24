<!-- Header -->
	<?php
	// session_start();
	// echo $_SESSION['name'];
	// echo $_SESSION['id'];
	// echo $_SESSION['password'];
	// echo $_SESSION['email'];
	
	include 'header.php';
	include "config.php";
	?>
	<!-- Header Part  End -->
	
	<!-- center Part start-->
	<div class="container" align="center"><br>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block " src="img/e-commerce-online-shopping.jpg" height="300" width="80%" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img/james-mckinven-tpuAo8gVs58-unsplash.jpg" height="300" width="80%"  alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img/lcd-led-tv-2048px-0943-3x2-1.jpg" height="300" width="80%"  alt="Third slide">
				</div>
			</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
		</div>
	</div>
<br>
<!--<div class="container">
	<div class="row">
		<div class="col-md-3">
			<h4>Select Brand Leptop:-</h4>
		</div>
		<div class="col-md-3" >
			<select class="form-control">
				<option selected disabled>Select</option>
				<option>HP</option>
				<option>Dell</option>
				<option>Lenovo</option>
				<option>Apple</option>
			</select>
		</div>
	</div>
</div>
-->
	<!-- Slider End -->
	<div class="container">
		<div class="row"> 
		<?php
			$rec = mysqli_query($conn,"select * from ecomadinprd")or die("Select Product Error".mysqli_error($conn));		
			$i=1;
			while($i <= $red=mysqli_fetch_array($rec))
		{	
		?>
		
			<div class="col-md-3">
			<br>
				<div class="card" style="background-color: #80ced6;">
		
				<img src= admin/<?php echo $red['img1'] ?> class='img-fluid' style="height:200px;">
		
					<div class="card-body">
		
						<h2 class="card-title"><?php echo $red['bname'] ?></h2>
						<h6 class="card-subtitle" style="Line-Height:2;">
					Model Name :- <?php echo $red['mname'] ?></h6>						
						<?php 					
							echo "<a href='laptop-detail.php?mid=".$red['prdid']."' class='card-link text-danger' style='color:lightblue'>View Product</a>";
						?>
					</div>
				</div>
			</div>
		<?php
			$i++;
		}
		?>
		
		<br>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<ul class="pagination pagination-lg">
					<li class="page-item"><a href="" class="page-link">&laquo;</a></li>
					<li class="page-item"><a href="index.php" class="page-link">1</a></li>
					<li class="page-item"><a href="about.php" class="page-link">2</a></li>
					<li class="page-item"><a href="contact.php" class="page-link">3</a></li>
					<li class="page-item"><a href="faq.php" class="page-link">4</a></li>
					<li class="page-item"><a href="" class="page-link">&raquo;</a></li>
				</ul>
			</div>
		</div>
	</div>
	<br><br><br>
	
	<!-- footer -->
	<?php
	include 'footer.php';
	?>
