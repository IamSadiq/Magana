<?php
/*---------------------------------------------LOGIN IMPLEMENTATION---------------------------------------------------*/

// db connection
db_connect();

if (isset($_POST['login'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	

	//check for connection error
	if (!$db_instance->connect_error)
	{
		/********************************************************************/
		/**Preventing sql injection, using mysqli real escape string method**/
		/********************************************************************/
		/**/   $username = $db_instance->real_escape_string($username);   /**/
		/**/   $password = $db_instance->real_escape_string($password);   /**/
		/********************************************************************/
		/********************************************************************/

		$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";

		$results = $db_instance->query($sql);
		$show = $results->fetch_assoc();
	}

	

	//var_dump($show["username"]);

	if($show["password"]){

		/***Hash Verificaation*****/

		//$hash_format = "$2y$10$";
		//$hash = explode("$", $show["password"]);
		//$existing_hash = $hash_format . $hash[4];

		$existing_hash = $show["password"];
		
		if(password_check($password, $existing_hash)) 
		{
			if (!$show["LoggedIn"]) {
				$_SESSION['username'] = $show["username"];
				$_SESSION['hash_password'] = $show["password"];
				$_SESSION['email'] = $show["email"];
				$_SESSION['pic'] = $show["profile_pic"];

				header("Location: index.php");
			}
			else
			{
				echo "user already signed in <a href='forgot-password.php'>Lost password ?</a>"; 
			}
		}
		else
		{
			// Unsuccessful login
			echo " Invalid Username or Password combination";
		}
		
	}
	else
	{
		// Unsuccessful login
		echo " Invalid Username or Password combination";
	}

}


/*---------------------------------------------SIGN-UP IMPLEMENTATION---------------------------------------------------*/

if(isset($_POST['signup'])) {

	$email = $_POST['email'];
	$pword1 = $_POST['pword1'];
	$pword2 = $_POST['pword2'];

	$email_is_valid;
	$password_is_valid;

	/********************EMAIL VALIDATION*******************/
	function validate_email($email){

     	global $email_is_valid;
     	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     		$email_is_valid=0;
     	}
     	else
     	{
     		$email_is_valid = 1;
     	}
	}


	/********************PASSWORD VALIDATION*******************/
	function validate_password(){

		global $password_is_valid, $pword1, $pword2;

		if (strlen($pword1) < 6) {
			echo " password's too weak";
			$password_is_valid = 0;
		}

		if ($pword2 != $pword1) {
			echo " passwords don't match";
			$password_is_valid = 0;
		}
	
		if(strlen($pword1) >= 6 && $pword2 == $pword1){
			$password_is_valid = 1;
		}
	}

	//function calls
	validate_email($email);
	validate_password();

	if ($email_is_valid && $password_is_valid) {

		/********************************************************************/
		/**Preventing sql injection, using mysqli real escape string method**/
		/********************************************************************/
		/**/   $pword1 = $db_instance->real_escape_string($pword1);       /**/
		/**/   $email = $db_instance->real_escape_string($email);		  /**/
		/********************************************************************/
		/********************************************************************/

		$sql = "SELECT * FROM users WHERE email = '$email'";
		
		$results = $db_instance->query($sql);
		if ($show = $results->fetch_assoc()) {
			echo $show["email"] . " is already registered <a href='../forgot-password.php'>Forgot password ?</a>";
		}
		else
		{
			$parts = explode("@", $email);
			$username = $parts[0];

			$hashed_password = password_encrypt($pword1);
			
			$sql = "INSERT INTO users(email, username, password) VALUES('{$email}', '{$username}','{$hashed_password}')";
			if ($db_instance->query($sql)) {

				$to = $email;
				$subject = "Magana Registration";
				$message = "Welcome to Magana, you've been successfully registered!!";

				// use wordwrap() if lines are longer than 70 characters
				$message = wordwrap($message, 70);
				
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <noreply@magana.org>' . "\r\n";
				$headers .= 'Cc: info@magana.org' . "\r\n";

				mail($to, $subject, $message, $headers);
				echo $email . " registered successfully<br>
				Visit your mail box to confirm";
			}
			else
			{
				echo " Registration Unsuccessful, Please Check entries and try again";
			}
		}
	}
	else
		echo " Registration Unsuccessful, Please Check entries and try again";
}
$db_instance->close();

/*
	if (is_numeric($username[0])) {
		echo "First Letter Must be a Letter";
		exit();
	}
*/

?>