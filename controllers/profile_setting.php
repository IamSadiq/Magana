
<?php 
if (isset($_POST['change_uname']) && $_POST['newusername'] != "" && $_POST['pword'] != "") {

	//$oldusername = $_SESSION['username'];
	$newusername = $_POST['newusername'];
	$pword = $_POST['pword'];

	$newusername = $db_instance->real_escape_string($newusername);
	$sql = "SELECT * FROM users WHERE username = '$newusername'";

	$result = $db_instance->query($sql);
	
	if ($show = $result->fetch_assoc()) {
		echo "Username is taken, choose another";
	}
	else
	{
		if (password_check($pword, $_SESSION['hash_password'])) {

			$sessionemail = $_SESSION['email'];
			$sql = "UPDATE users SET username = '$newusername' WHERE email = '$sessionemail'";
			$db_instance->query($sql);
			$_SESSION['username'] = $newusername;
			echo "Username successfully changed to " . $_SESSION['username'];
		}
		else{
			echo "wrong password, <a href='forgot-password.php'>forgot password?</a>";
		}
	}
}

if (isset($_POST['change_pword']) && $_POST['newpword'] != "" && $_POST['oldpword'] != "") {

	$sessionpword = $_SESSION['hash_password'];
	$sessionemail = $_SESSION['email'];

	$oldpword = $_POST['oldpword'];
	$newpword = $_POST['newpword'];

	//echo $oldpword . " = " .$newpword;

	if (password_check($oldpword, $sessionpword)) {
		
		$hashed_password = password_encrypt($newpword);

		$sql = "UPDATE users SET password = '$hashed_password' WHERE email = '$sessionemail'";
		$db_instance->query($sql);
		$_SESSION['hash_password'] = $hashed_password;
		echo "password successfully changed";
	}
	else
	{
		echo "wrong old password, <a href='forgot-password.php'>forgot password?</a>";
	}
}

/*
if (file_exists("images/user_images/bad_days.png")) {
	echo "FILE EXISTS";
	file_delete("images/user_images/bad_days.png")
}*/

?>	