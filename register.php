<?php
	session_start();
	include('dbfunctions.php');
	if (isset($_POST['register']))
	{
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$passwd = mysqli_real_escape_string($db, $_POST['passwd']);
		$repasswd = mysqli_real_escape_string($db, $_POST['repasswd']);

		if (passcheck($passwd, $repasswd))
		{
			if (checkuser($email) == 0)
			{
				create_user($name, $email, $passwd);
				header("Location: index.php");
			}
			else
			{
				echo "<h1>User exists!</h1>";
			}
		}
		else
		{
			echo "<h1>Passwords does not match</h1>";
		}
	}
?>
