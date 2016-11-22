<?php
$uname = 'Anonymous';
$email = 'Anonymous@magana.com';
$pic = 'user1';
$bio = "I'm Anonymous...";

if (!isset($_SESSION['username'])) 
	require_once("login_register.php");

if(isset($_GET['uname'])){
	$uname = $_GET['uname'];

	// db connection
	db_connect();

	//check for connection error
	if (!$db_instance->connect_error){
		$username = $db_instance->real_escape_string($uname);

		$sql = "SELECT * FROM users WHERE username = '$username'";

		$results = $db_instance->query($sql);
		$show = $results->fetch_assoc();

		$uname = $show['username'];
		$email = $show['email'];
		$pic = $show['profile_pic'];
		$bio = $show['bio'];
	}
}