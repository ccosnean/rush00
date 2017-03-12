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
		<?php include('menu.php'); 

		if (isset($_GET['id']))
			$productid = $_GET['id'];
		$q = fetch(query("SELECT * from `products` WHERE `idproducts` = $productid"));

		?>
		<br>
		<br>
		<div class="product_container">
			<img style="position: absolute; border: 1px solid" width="350px" height="350px" src="<?php echo trim($q['main_image'], "'");?>">
			<p id="detailed_product_name"><? echo $q['name']; ?></p>
			<span style="position: absolute; left: 400px; top: 70px">
				<font size="3px">
				<br>
					<p>sku: <? echo $q['sku']; ?></p>
					<p> <? 
						if ($q['stock'] == 0)
							echo "<i class='red'>Out of stock</i>";
						else
							echo "stock: " .$q['stock']; ?></p>
				</font>
			</span>
			<p id="detailed_product_price"><? echo $q['price'] ?>$</p>
			<div class="detailed_product_desc">
				<? echo $q['description']; ?>
			</div>
			<form action="addtocard.php" class="addtocardform" method="post">
				<input type="hidden" name="prodid" value="<? echo $q['idproducts']; ?>">
				<input type="hidden" name="price" value="<? echo $q['price']; ?>">
				<input style="width: calc(100% - 24px);padding:10px;" name="stock" type="number" min="1" value="1" <?
					if ($q['stock'] == 0)
						echo " disabled";
				?>/><br>
				<input style="width:100%;" type="submit" name="add" class="btn" value="Add to card" <?
					if ($q['stock'] == 0)
						echo " disabled";
				?>/>
			</form>
		</div>
		<div class="feedback_container">
			<hr>
			<br>
			<p>Leave feedback:</p>
			</br>
			<form method="post" action="addcomment.php">
				<input type="hidden" name="productid" value="<? echo $productid; ?>">
				<textarea name="feedback" class="text" rows="5"></textarea></p>
				<input style="float: right;" class="btn" type="submit" value="Send">
			</form>
			</br>
			</br>
			</br>
			<p>Other comments</p>
			</br>
			<?php 
				include("print_comments.php");
			?>
			</br>
		</div>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>