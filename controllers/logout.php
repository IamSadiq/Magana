<?php
require('functions.php');
/*--------------------Logout implementation--------------------*/
session_start();

//db connection
db_connect();
$email = $db_instance->real_escape_string($_SESSION['email']);

session_unset();
session_destroy();

$sql = "UPDATE users SET LoggedIn = 0 WHERE email = '$email'";
$db_instance->query($sql);

//mysqli_prepare()
//mysqli_bind_param()

$db_instance->close();
header("Location: ../index.php");
exit();
?>