<?php
	session_start();
	include("dbfunctions.php");
	if (isset($_POST['save']))
	{
		if (!empty($_POST['passwd']))
		{
			if (passcheck($_POST['newpasswd'],$_POST['repasswd']) && validpass($_POST['passwd'], $_SESSION['email']) != 0)
			{
				$name = mysqli_real_escape_string($db, $_POST['name']);
				$pass = mysqli_real_escape_string($db, $_POST['newpasswd']);
				$img = mysqli_real_escape_string($db, $_POST['image']);
				saveinfopass($name, $pass, $img);
				header("Location: cabinet.php");
			}
			else
			{
				echo "<h1>Passwords does not match</h1>";
				exit();
			}
		}
		else
		{
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$img = mysqli_real_escape_string($db, $_POST['image']);
			saveinfo($name, $img);
			header("Location: cabinet.php");
		}
	}
	else
		header("Location: index.php");

?>