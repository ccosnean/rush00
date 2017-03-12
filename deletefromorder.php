<?php
	session_start();
	include ("dbfunctions.php");
	if (isset($_GET['del']))
	{
		$ordid = $_GET['ordid'];
		query("
			delete from orders where idorders = $ordid;
			");
	}
	header("Location: order_page.php");
?>