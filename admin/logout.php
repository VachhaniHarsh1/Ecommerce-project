<?php
	include "config.php";
	session_start();
	if(!isset($_SESSION['nam']))
	{
		echo "<script>window.location.replace('index.php')</script>";		
	}
	session_destroy();
	header("location:index.php"); 
?>