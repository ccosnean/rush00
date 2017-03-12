<?php
	session_start();
	include ("dbfunctions.php");
	$uid = get_id($_SESSION['email']);
	query("
		update orders set `confirmed` = 1, `date_confirmed` = (SELECT CONVERT_TZ(now(), '+08:00','+10:00')) where `fk_user_id` = $uid;
		");
	header("Location: order_page.php");
?>