<?php
$msg = "Enter Credentials";
$class = "alert alert-info";
if(isset($_POST['login'])){
	$username = ($_POST['username']);
	$password = md5($_POST['password']);
	if((login($username,$password))){
		header('location: dashboard.php');
	}else{
		$msg = "Invalid login details";
		$class = "alert alert-danger";
	}
}