<?php
	session_start();
	header("Content-Type: text/plain");
	include("dbfunctions.php");
	if (isset($_POST['addarticle']))
	{
		foreach ($_POST['category'] as $val) {
			$category[] = $val;
		}
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$stock = mysqli_real_escape_string($db, $_POST['stock']);
		$description = mysqli_real_escape_string($db, $_POST['description']);
		$price = mysqli_real_escape_string($db, $_POST['price']);
		$mainimage = mysqli_real_escape_string($db, $_POST['mainimage']);
		$sku = uniqid();

		query("insert into products (`idproducts`, `name`, `sku`, `stock`, `description`, `main_image`, `price`) values (NULL, '$name', '$sku', '$stock', '$description', '$mainimage', $price);");
		foreach ($category as $value) {
			query("insert into products_category (`idproducts_category`, `fk_categories_id`, `fk_products_id`) values (NULL, '$value', (select `idproducts` from `products` where `sku` = '$sku'));");
		}
		header("Location: cabinet.php");
	}
?>