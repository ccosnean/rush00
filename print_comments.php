<?php
	$comments = query("
		select * from comments where id_product = $productid;
		");
	while ($c = fetch($comments))
	{
		$uid = $c['id_user'];
		$user = fetch(query("select * from users where idusers = $uid"));
?>

<div class="comment_div">
<div style="position: absolute; top: 5px; left: 5px; height: 60px; width: 60px; border-radius: 100%; overflow: hidden;">
	<img style="width:100%;" src="<? echo $user['user_image']; ?>">
</div>
	<p style="position: absolute; top: 5px; left: 75px;"><? echo $user['name'];?></p>
	<font size="2.4px" color="blue">
		<p style="position: absolute; top: 24px; left: 75px; color:gray;"><? echo userTypeParam($user['email']); ?></p>
	</font>
	<p style="margin-top: 50px; margin-left: 75px; margin-bottom: 10px;">
		<?php echo $c['message']; ?>
	</p>
</div>
</br>
<?php
	}
?>