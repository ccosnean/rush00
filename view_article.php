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
		<div class="product_container">
			<img style="position: absolute; border: 1px solid" width="350px" height="350px" src="https://www.skusky.com/Images/DefaultProduct.jpg">
			<p id="detailed_product_name">%name%</p>
			<span style="position: absolute; left: 400px; top: 70px">
				<font size="3px">
					<p>sku: %sky%</p>
					<p>stock: %stock%</p>
				</font>
			</span>
			<p id="detailed_product_price">%price%</p>
			<div class="detailed_product_desc">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
				eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
				enim ad minim veniam, quis nostrud exercitation ullamco laboris 
				nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
				in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
				nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
				sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
			<form style="position: absolute; right: 55px; top: 370px" method="post">
				<input type="number" value="Amount" />
				<input type="submit" value="Add to card" />
			</form>
		</div>
		<div class="feedback_container">
			<hr>
			<br>
			<p>Leave feedback:</p>
			</br>
			<form method="post">
				<textarea name="feedback" cols="147" rows="5"></textarea></p>
				<input style="float: right;" type="submit" value="Send">
			</form>
			</br>
			<p>Other comments</p>
			</br>
			<?php include("comment_div.php");?>
			</br>
		</div>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>