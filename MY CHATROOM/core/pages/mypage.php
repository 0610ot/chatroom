<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])) {
  header("Location: index.php");
}

// ユーザーIDからユーザー名を取り出す
$query = "SELECT * FROM users WHERE user_id=".$_SESSION['user']."";
$result = $mysqli->query($query);

$result = $mysqli->query($query);
if (!$result) {
  print('クエリーが失敗しました。' . $mysqli->error);
  $mysqli->close();
  exit();
}

// ユーザー情報の取り出し
while ($row = $result->fetch_assoc()) {
  $username = $row['user_name'];
  $email = $row['email'];
}

// データベースの切断
$result->close();

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MY CHATROOM</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/mypage.css">
<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
    <?php
    require("header.php");
    ?>
    <div id="my-main">
      <h2>Profile</h2>
      <div id="mypage">
        <div class="mypage-user">
          <div id="mypage-user-box">
            <figure>
              <img id="user-icon" src="img/mypage.jpg" alt width="80" height="80">
            </figure>
            <h3 class="bold">ユーザー名</h3>
          </div>
        </div>
      </div>
      <div id="my-edit">
        <form action="" method="post">
        <dl class="clearfix">
          <dt>
            氏名<span class="red">*</span>
          </dt>
          <dd>
            <input type="text" name="name" value="<?php echo $username; ?>">
          </dd>
          <dt>
            メールアドレス<span class="red">*</span>
          </dt>
          <dd>
            <input type="text" name="mail" value="<?php echo $email; ?>">
          </dd>
        </dl>
        <dl>
          <a href="logout.php?logout">ログアウト</a>
        </dl>
      </form>
      </div>
    </div>
    <?php
    require("footer.php");
    ?>
<body>

</html>
