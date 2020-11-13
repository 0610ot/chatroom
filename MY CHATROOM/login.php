<?php
var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MY CHATROOM</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
	<div id="log-main">
		<h1 class="login">LogIn</h1>
		<div id="log-form">
			<form class="form" method="post">
				<p class="name">
					<input class="name" name="name" type="text"  id="user_name" placeholder="name" required />
				</p>
				<p class="email">
					<input class="email" name="email" type="text" id="email" placeholder="email" required />
				</p>
				<p class="pass">
					<input class="pass" name="password" type="text" id="user_password" placeholder="password" required />
				</p>
				<div class="submit">
					<button type="submit" class="btn btn-default" name="login">ログイン</button>
					<a href="signup.php">会員登録はこちら</a>
				</div>
			</form>
		</div>
	</div>

</body>

</html>
