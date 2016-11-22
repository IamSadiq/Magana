<?php

$sess_email = $_SESSION['email'];
global $user_bio;

$sql = "SELECT * FROM users WHERE email = '{$sess_email}'";
$results = $db_instance->query($sql);

if ($show = $results->fetch_assoc())
	$user_bio = $show["bio"];

if (isset($_POST['bio-btn'])){

	$bio = $_POST['textarea'];
	$bio = $db_instance->real_escape_string($bio);
	$sql = "UPDATE users SET bio = '{$bio}' WHERE email = '{$sess_email}'";

	if($db_instance->query($sql)){
		$sql = "SELECT * FROM users WHERE email = '{$sess_email}'";
		$results = $db_instance->query($sql);

		if ($show = $results->fetch_assoc())
			$user_bio = $show["bio"];
	}else
		$user_bio = "Error inserting";
}	
?>