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
		<header>
			<?php include('menu.php'); ?>
		</header>

		<?php include('article.php'); ?>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>
