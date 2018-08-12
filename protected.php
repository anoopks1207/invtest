<?php
// initialize session
session_start();
$ip = $_SERVER["REMOTE_ADDR"];
if(!isset($_SESSION['SESS_UNAME'])) {
	// user is not logged in, do something like redirect to login.php
	header("Location: login.php");
	die();
} 

		require_once('dbconnect.php');
		$query = "Login Successful from $ip";
		$user = $_SESSION['SESS_UNAME'];
		include('log.php');	
header("location: landing.php");
?>
 
