<?php

require_once 'serversetup.php';

// Create connection
$conn = new mysqli($servername, $serverusername, $serverpassword, "users");

if (!empty($_POST["username"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$sql = "select username, password from users where username='". $username ."'and password='" . $password . "'";

	$result = $conn->query($sql);

	if($result->num_rows == 0){
		unset($_POST["username"]);
		include'failedlogin.php';
	} else{
		$_SESSION["username"] = $username;
		include 'index.php';
	}
} else{
	include 'login.php';
}








