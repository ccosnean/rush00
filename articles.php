<br>
<h2>Add articles</h2>
<br>
<div class="articleadd">
<form action="addarticle.php" method="post" class="articlesform">
	<a href="index.php">View all articles</a>
	<br>
	<br>
	Category
	<select name="category[]" multiple style="min-height:110px;">
		<?php
			echo categories();
		?>
	</select><br>
	Name
	<input type="text" name="name"><br>
	Stock
	<input type="number" name="stock" min="0"><br>
	Description
	<textarea name="description"></textarea><br>
	Price
	<input type="number" name="price" min="0"><br>
	Main image(only hosted)
	<input type="text" name="mainimage"><br>
	<br>
	<button type="submit" name="addarticle" class="btn">Add new article</button>
</form>
</div>
<br>
<br>