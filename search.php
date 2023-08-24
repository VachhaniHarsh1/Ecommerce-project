<!-- Header -->
	<?php
	include "config.php";
	include 'header.php';
	?>
	<!-- Header Part  End -->
	<br><br>
	
	<div class="container">
<?php	
	$nm=$_REQUEST['searchdata'];
	echo "<b>Search Data :- </b>".@$nm;
?>
	</div>
	

<!-- footer -->
		<?php
	include 'footer.php';
	?>