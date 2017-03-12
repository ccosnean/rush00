<?php
	session_start();
	include ("dbfunctions.php");
	if (authcheck() && userType() === 'Admin')
	{
		$uid = 0;
		if (isset($_GET['id']))
			$uid = $_GET['id'];
		query("DELETE FROM `user_permisions` where `fk_id_user` = $uid");
		query("DELETE FROM `orders` where `fk_user_id` = $uid");
		query("DELETE FROM `users` where `idusers` = $uid");
		query("DELETE FROM `comments` where `id_user` = $uid");
		header("Location: cabinet.php");
	}
?>