<?php
	$db = mysqli_connect("10.21.0.96", "root", "bitnami", "academyshop");
	
	function h($pass)
	{
		return hash("whirlpool", $pass);
	}

	function query($q)
	{
		global $db;
		return mysqli_query($db, $q);
	}

	function categories()
	{
		$res = query("select * from `categories`");
		while ($arr = fetch($res))
			echo "<option value = '". $arr['idcategories'] ."'>" . $arr['category'] . "</option>";
	}

	function categoriesvalues()
	{
		$res = query("select * from `categories`");
		while ($arr = fetch($res))
			echo "<option value = '". $arr['category'] ."'>" . $arr['category'] . "</option>";
	}

	function get_id($email)
	{
		return fetch(query("SELECT `idusers` as 'id' FROM `users` where email = '$email'"))['id'];
	}

	function fetch($qresult)
	{
		return mysqli_fetch_array($qresult, MYSQLI_ASSOC); 
	}

	function validpass($pass, $email)
	{
		$pass = h($pass);
		return fetch(query("select count(*) as 'nr' from `users` where `email` = '$email' and passwd = '$pass'"))['nr'];
	}

	function userIMG()
	{
		$email = $_SESSION['email'];
		return fetch(query("select `user_image` from users where email = '$email'"))['user_image'];
	}

	function userName()
	{
		$email = $_SESSION['email'];
		return fetch(query("select `name` from users where email = '$email'"))['name'];
	}

	function userType()
	{
		$uid = get_id($_SESSION['email']);
		return fetch(query("
				select permisions.permision from user_permisions
				join permisions on user_permisions.fk_permision_id = permisions.idpermisions
				where user_permisions.fk_id_user = $uid;
			"))['permision'];
	}

	function userTypeParam($email)
	{
		$uid = get_id($email);
		return fetch(query("
				select permisions.permision from user_permisions
				join permisions on user_permisions.fk_permision_id = permisions.idpermisions
				where user_permisions.fk_id_user = $uid;
			"))['permision'];
	}

	function authcheck()
	{
		return $_SESSION['email'];
	}

	function saveinfopass($name, $pass, $img)
	{
		$pass = h($pass);
		$uid = get_id($_SESSION['email']);
		query("update `users` set `name` = '$name', `passwd` = '$pass', `user_image` = '$img' where `idusers` = $uid");
	}

	function saveinfo($name, $img)
	{
		$uid = get_id($_SESSION['email']);
		query("update `users` set `name` = '$name', `user_image` = '$img' where `idusers` = $uid");
	}

	function passcheck($pass, $repass)
	{
		return $pass === $repass;
	}

	function checkuser($email)
	{
		return fetch(query("select count(*) as 'nr' from users where `email` = '$email'"))['nr'];
	}

	function create_user($name, $email, $passwd)
	{
		$passwd = h($passwd);
		query("insert into users (`idusers`, `name`, `email`, `passwd`, `register_date`, `login_date`) values (NULL, '$name', '$email', '$passwd', now(), now()); ");
		$userid = get_id($email);
		query("insert into user_permisions (`iduser_permisions`, `fk_id_user`, `fk_permision_id`) values (NULL, $userid,  1);");
	}

	function logout()
	{
		$_SESSION = array();
		header("Location: index.php");
	}

	function login($email, $pass)
	{
		$pass = h($pass);
		$res = fetch(query("select `email`, `passwd` from `users` where `email` = '$email'"));
		if ($res)
		{
			if (passcheck($res['passwd'], $pass))
			{
				$uid = get_id($email);
				query("update `users` set `login_date` =  (SELECT CONVERT_TZ(now(), '+08:00','+10:00')) where `idusers` = $uid;");
				$_SESSION['email'] = $email;
				header("Location: index.php");
				echo "<h1>Hi, you have been succesifuly logged in!</h1>";
			}
			else
			{
				echo "<h1>Ouups!... looks like the password is wrong!</h1>";
			}
		}
		else
		{
			echo "<h1>Ouups!... looks like user does not exist!</h1>";
		}
	}

?>