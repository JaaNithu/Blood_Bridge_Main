<?php
	include "config.php";
	session_start();
	$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
}
	$s="delete from blood where Blood_ID={$_GET["id"]}";
	$connect->query($s);
	echo "<script>window.open('addBlood.php?mes=Data Deleted...','_self');</script>";


?>