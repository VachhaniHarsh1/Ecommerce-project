<?php
	include "config.php";
	session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
    <title>Hello, world!</title>
  </head>
  <body>
  
	<!-- Header -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">E-Commerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="faq.php">FAQ</a>
      </li>	
	  <?php 
			if(isset($_SESSION['name']))
			{
		?>
		<?php			
			if(isset($_SESSION['id']))
			{

			  $uid = $_SESSION['id'];  
			  $select = mysqli_query($conn,"SELECT uid FROM ecomcart WHERE uid='$uid'");
			  if(mysqli_num_rows($select) > 0)
			  {
				  $cart_count = mysqli_num_rows($select);
			  }
			  else
			  {
				$cart_count = 0;
			  }
			  $_SESSION['cartcount'] = $cart_count;

			}		
				// echo "( <b style='color:green;'>".@$cart_count."</b> )";
		?>
		</a>
      </li>
		<?php } ?>
		<?php
		if(isset($_SESSION['name']))
		{
		?>
		 <li class="nav-item">
			<a class="nav-link " href="cart.php">Cart( 
			<?= @$cart_count ?> )</a>
		</li>
		<?php } ?>
   </ul>
   <?php
		if(isset($_SESSION['name']))
		{
			echo '<h5><font color="white"> Welcome:-';
			echo $_SESSION["name"];
			echo '&nbsp;&nbsp;</font></h5>';
		}
	?>
	

    <form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" name="searchdata" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
      <button class="btn btn-outline-success my-2 my-sm-0" name="sb1" type="submit">Search</button>
	</form><span>&nbsp;&nbsp;   </span>
	
	<?php
		if(!isset($_SESSION['email']))
		{
			echo '<a href="signup.php"><span class="btn btn-outline-success mr-sm-2 "> Sign Up</a>';
			echo '<a href="login.php"><span class="btn btn-outline-success mr-sm-2">Login</a>';
		}
	?>
	
	<?php
		if(isset($_SESSION['email']))
		{
			echo '<a href="logout.php"><span class="btn btn-outline-success mr-sm-2">LogOut</a>';
		}
	?>
</nav>		
	</div>
	<!-- Header Part  End -->
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


