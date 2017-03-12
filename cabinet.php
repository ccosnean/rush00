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
		<br>
		<?php
			if (userType() === "User")
			{
				echo "<p>" . userName() . ", here you can change your acount setings</p>";
				include ('setings.php');
				//include ('log.php');
			}
			else if (userType() === "Moderator")
			{
				echo "<p>" . userName() . ", here you can change articles, and your acount</p>";
				include ('setings.php');
				include ('articles.php');
				//include ('log.php');
			}
			else if (userType() === "Admin")
			{
				echo "<p>" . userName() . ", my master!...</p>";
				include ('setings.php');
				include ('articles.php');
				include ('user_edit.php');
				//include ('users.php');
				//include ('log.php');
			}
		?>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>
