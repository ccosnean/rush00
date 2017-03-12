<div class="article_div">
	<img id="article_img" src="https://www.skusky.com/Images/DefaultProduct.jpg">
	<a id="name_label">%name%</a>
	<a href="view_article.php?id=<? echo $a['idproducts'] ?>">
		<span id="link_block"></span>
	</a>
	<p id="product_price">%price%<!-- <? echo $a['price'] ?> --></p>
	<div class="article_desc">
		<p>%descripion%<!--
			<? echo substr($a['description'], 0, 260);
				if (strlen($a['description']) > 260)
					echo "...";
			?>
			-->
		</p>
	</div>
	<span class="stock">Count: %order_count</span>
	<form method="post">
		<input style="position: absolute; top: 85px; right: 10px; z-index: 2;" type="submit" value="Delete from order">
	</form>
</div>
</br>