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
		<form method="post">
			<button style="width: 100%; height: 100px">
				<img width="70px" style="position: absolute; left: 300px; top: 50px" src="https://d30y9cdsu7xlg0.cloudfront.net/png/28468-200.png">
				<font style="position: absolute; left: 390px; top: 70px" size="5px">
					Confirm my order
				</font>			
			</button>
		</form>
		<div class="order_container">
			<?php include("order_elem.php"); ?>
		</div>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>