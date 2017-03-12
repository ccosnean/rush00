<?php
	session_start();
	include ("dbfunctions.php");
	if (isset($_POST['login']))
	{
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$pass = mysqli_real_escape_string($db, $_POST['passwd']);
		login($email, $pass);
	}
?>
	