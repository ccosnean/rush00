<?php
	session_start();
	include('dbfunctions.php');
	if (isset($_POST['add']))
	{
		$price = $_POST['price'];
		$prodid = $_POST['prodid'];
		$stock = $_POST['stock'];
		$uid = get_id($_SESSION['email']);
		query("
			INSERT INTO `academyshop`.`orders`
			(`idorders`,
			`date_ordered`,
			`date_confirmed`,
			`price`,
			`fk_product_id`,
			`fk_user_id`,
			`confirmed`,
			`stock`)
			VALUES
			(NULL, NOW(), null, $price, $prodid, $uid, 0, $stock);");
		$s = fetch(query("select stock from products where `idproducts` = $prodid;"))['stock'];
		if ($s - $stock <= 0)
			$s = 0;
		else
			$s -= $stock;
		query ("
			UPDATE `academyshop`.`products`
			SET
			`stock` = $s
			WHERE `idproducts` = $prodid;
			");
	}
	header("Location: view_article.php?id=".$prodid);
?>