<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>AcademyShop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="javascript.js"></script>
</head>
<body>
	<div class="container content">
		<?php include('menu.php'); ?>
		<br>
		<br>

				<?php
					$uid = get_id($_SESSION['email']);
					$q = query("select products.idproducts, products.name, products.description, products.main_image, orders.* from orders
								join products on products.idproducts = orders.fk_product_id
								where orders.fk_user_id = $uid and confirmed = 1;
							");

					if (mysqli_num_rows($q) == 0)
						echo "<br><h1>History is empty!</h1>";
					while ($r = fetch($q))
					{
				?>
					<div class="article_div">
						<img id="article_img" src="https://www.skusky.com/Images/DefaultProduct.jpg">
						<a id="name_label"><? echo $r['name'] ?></a>
						<a href="view_article.php?id=<? echo $r['idproducts'] ?>">
							<span id="link_block"></span>
						</a>
						<p id="product_price"> <? echo $r['price'] ?>$</p>
						<div class="article_desc">
							<p>
								<? echo substr($r['description'], 0, 260);
									if (strlen($r['description']) > 260)
										echo "...";
								?>
							</p>
						</div>
						<span class="stock">Count: <? echo $r['stock'];?></span>
						<span id="category">
							Date confirmed: <? echo $r['date_confirmed']; ?>
						</span>
					</div>
				<?php
					}
				?>
				<br>



		<?php include('footer.php'); ?>
	</div>
</body>
</html>
