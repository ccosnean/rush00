<?php
	session_start();
	include ("dbfunctions.php");
	if (authcheck() && userType() === 'Admin')
	{
		$uid = 0;
		if (isset($_GET['id']))
			$uid = $_GET['id'];
		query("DELETE FROM `user_permisions` where `fk_id_user` = $uid");
		query("DELETE FROM `users` where `idusers` = $uid");
		header("Location: cabinet.php");
	}
?>