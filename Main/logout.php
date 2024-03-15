<?php
	include "config.php";
	session_start();
	
	
	unset ($_SESSION["ID"]);
	unset ($_SESSION["password"]);
	unset ( $_SESSION['email']);
	
	session_destroy();
	echo "<script>window.open('login.php','_self');</script>";
?>