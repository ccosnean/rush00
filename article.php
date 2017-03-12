<?php
	$res = query("select * from products;");

	if (isset($_GET['category']))
	{
		$c = "";
		$nr = count($_GET['category']);
		foreach ($_GET['category'] as $val) {
			$c .= "categories.category = '" . $val . "'";
			if (--$nr > 0)
				$c .= " OR ";
		}
		$res = query("
			select distinct idproducts, `name`, `sku`, `stock`, `description`, `main_image`, `price` from (select  products.* , categories.category as 'cat' from products_category
			join categories on products_category.fk_categories_id = categories.idcategories
			join products on products_category.fk_products_id = products.idproducts
			where $c)t1;
			");
	}
	
	while ($a = fetch($res))
	{
?>

<div class="article_div">
	<img id="article_img" src=<? echo $a['main_image']; ?>>
	<a id="name_label"><? echo $a['name'];?></a>
	<a href="view_article.php?id=<? echo $a['idproducts'] ?>">
		<span id="link_block"></span>
	</a>
	<p id="product_price"><? echo $a['price'] ?>$</p>
	<div class="article_desc">
		<p><? echo substr($a['description'], 0, 260);
				if (strlen($a['description']) > 260)
					echo "...";
			?>
		</p>
	</div>
	<span class="stock"><? 
						if ($a['stock'] == 0)
							echo "<i class='red'>Out of stock</i>";
						else
							echo "stock: " .$a['stock']; ?></span>
	<p id="category">Categoriile: 
	<?
		$pid = $a['idproducts'];
		$cat = query("
			select category from products_category
			join categories on products_category.fk_categories_id = categories.idcategories
			where products_category.fk_products_id = $pid;
			");
		$nr = mysqli_num_rows($cat);
		while ($r = fetch($cat))
		{
			echo $r['category'];
			if (--$nr > 0)
				echo ",";
		}
	?>
	</p>
</div>	

<?
	}
?>