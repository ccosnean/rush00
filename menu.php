<header>
<nav class="navbar">
		<a href="index.php" class="logo">AcademyShop</a>
		<?php
			include ('dbfunctions.php');
			if (!authcheck())
			{
		?>
		<div class="acountBTNS">
			<a href="#l" onclick="tooglelogin();">Login</a>
			<a href="#r" onclick="toogleregister()">Register</a>
			</div>
		<?php
			}
			else
			{
		?>
		<div class="user">
		<a href="cabinet.php">
			<span class="userimage">
				<img src="<?php echo userIMG();?>" class="userface"/>
			</span>
			<span>
				<?php echo userName(); ?>
			</span>
			<br>
			<i style="color:gray;"><?php echo userType(); ?></i>
		</a>
		</div>
		<div class="acountBTNS">
			<a href="orders.php">Orders</a>
			<a href="logout.php">Logout</a>
			</div>
		<?php
			}
		?>
</nav>
<?php 
	if (!authcheck())
	{
?>
<div class="container content forms">
	<form action="login.php" method="post" class="loginform" id = "loginform">
			<input type="text" name="email" placeholder="Email">
			<br>
			<input type="password" name="passwd" placeholder="Password">
			<br>
			<button type="submit" name="login" class="btn">Login</button>
			<a href="forgot.php">Forgot password!</a>
	</form>
	<form action="register.php" method="post" id="registerform">
		<input type="text" name="name" placeholder="Name"><br>
		<input type="text" name="email" placeholder="Email"><br>
		<input type="password" name="passwd" placeholder="Password"><br>
		<input type="password" name="repasswd" placeholder="Retype password"><br>
		<button type="submit" name="register" class="btn">Register</button>
	</form>
</div>
<?php
	}
?>
</header>