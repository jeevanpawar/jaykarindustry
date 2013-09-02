<?php
ob_start();
session_start();
$a=$_SESSION['user'];

if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
?>