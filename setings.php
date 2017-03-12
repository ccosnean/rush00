<br>
<br>
<form action="changesetings.php" method="post" id="saveinfo">
	<p>Email: <?php echo $_SESSION['email']; ?></p><br>
	Name<input type="text" name="name" value="<?php echo userName(); ?>" /> <br>
	Old password<input type="password" name="passwd"/> <br>
	New password<input type="password" name="newpasswd"/> <br>
	Retype password<input type="password" name="repasswd"/> <br>
	Image(only hosted)<a class="pagelink" href="<?php echo userIMG(); ?>" target="_blank"> look&nbsp;</a>
	<input type="text" name="image" value = "<?php echo userIMG(); ?>">
	<br>
	<br>
	<button type="submit" name="save" class="btn">Save</button>
</form>