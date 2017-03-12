<?php
	echo "<h2>All users</h2><br>";
	$user = query("select * from users");
	while ($u = fetch($user))
	{
?>

<div class="adm_ulist_user">
	<div id="adm_ulist_user_img">
		<img id="" src="<? echo $u['user_image']; ?>">
	</div>
	<p id="adm_ulist_user_name"><? echo $u['name']; ?></p>
	<span class="date">
		<p class="">Registered: <? echo $u['register_date'] ?></p>
		<p class="">Last login: <? echo $u['login_date'];?></p>
	</span>
	<p id="adm_ulist_user_perm"><? echo userTypeParam($u['email']); ?></p>
	<form id="permission_form" action="cabinet.php" method="post">
		<input type="hidden" name="userid" value="<? echo $u['idusers']?>"/>
		<select name="perms">
			<option value="1">User</option>
			<option value="2">Moderator</option>
			<option value="3">Admin</option>
		</select>
		<button type="submit" name="saveuserinfo" value="save" id="saveuserinfo">
			Save
		</button>
	</form>
	<a href="deleteuser.php?id=<? echo $u['idusers']?>">
	<button id="usr_delete_btn">
		<img id="delete_img" src="http://vignette4.wikia.nocookie.net/deusex/images/e/e4/Icon_cross.png/revision/latest?cb=20110905165325&path-prefix=en">
	</button>
	</a>
</div>
</br>
<?php
	}
?>