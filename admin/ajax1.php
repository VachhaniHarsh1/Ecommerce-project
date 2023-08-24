<?php

	include "config.php";	
	
	$cname = $_REQUEST['nm'];
	// echo @$cname;
	
	$res = mysqli_query($conn,"select tid from ecomadincat where catid='$cname'");
	$res1=mysqli_fetch_array($res);
	
	echo $cid=$res1['tid'];
?>