<?php
session_start();
if( isset($_SESSION['user']) != "") {
  // ログイン済みの場合はリダイレクト
  header("Location: mypage.php");
}
// DBとの接続

include_once 'dbconnect.php';

// signupがPOSTされたときに下記を実行
var_dump($_POST);
if(isset($_POST['signup'])) {

  $user_name = $mysqli->real_escape_string($_POST['user_name']);
  $email = $mysqli->real_escape_string($_POST['email']);
  $user_password = $mysqli->real_escape_string($_POST['user_password']);
  $user_password = password_hash($user_password, PASSWORD_DEFAULT);

  // POSTされた情報をDBに格納する
  $query = "INSERT INTO users(user_name,email,user_password) VALUES('$user_name','$email','$user_password')";

  if($mysqli->query($query)) {  ?>
    <div class="alert alert-success" role="alert">登録しました</div>
    <?php } else { ?>
    <div class="alert alert-danger" role="alert">エラーが発生しました。</div>
    <?php
  }
}
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
  <div id="wrapper">
    <?php
    require("header.php");
    ?>

    <div id="log-main">
      <h1>SignUp</h1>
    <div id="log-mainbox">
      <div id="log-form">
        <form class="form" method="post">
          <p class="name">
            <input class="name" name="user_name" type="text"  id="name" placeholder="name" required />
          </p>
          <p class="email">
            <input class="email" name="email" type="text" id="email" placeholder="email" required />
          </p>
          <p class="pass">
            <input class="pass" name="user_password" type="text" id="password" placeholder="password" required />
          </p>
          <div class="submit">
            <button type="submit" class="btn btn-default" name="signup">会員登録する</button>
            <a href="index.php?page=login">ログインはこちら</a>
          </div>
        </form>
      </div>
    </div>
    </div>
    <?php
    require("footer.php");
    ?>
  </div>
<body>

</html>
