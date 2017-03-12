<?php
	session_start();
	include ("dbfunctions.php");
	$aid = mysqli_real_escape_string($db,$_POST['productid']);
	if (authcheck())
	{
		$msg = mysqli_real_escape_string($db, $_POST['feedback']);
		$uid = get_id($_SESSION['email']);
		query("insert into comments (idcomment, id_product, id_user, message) values (NULL, '$aid', '$uid', '$msg');");
	}
	header("Location: view_article.php?id=".$aid)
?>