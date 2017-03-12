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
		<h3>Our products</h3>
		<br>
		<form action="index.php" method="get" class="searchform">
		<p>Categories...</p>
		<br>
			<select name="category[]" multiple>
				<?php
					echo categoriesvalues();
				?>
			</select>
			<button type="submit" style="width:100%;" class="btn">Search</button>
		</form>
		<?php include('article.php'); ?>
		<br>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>