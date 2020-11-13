<?php
include('core/init.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MY CHATROOM</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/new.css">
<link rel="stylesheet" type="text/css" href="css/chat.css">
<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
  <div id="wrapper">
    <?php
    require("header.php");
    ?>
    <?php
    // ここでテンプレートファイルを読み込む。$include_fileは後ほど作成します。
    include($include_file);
    ?>
    <?php
    require("footer.php");
    ?>
  </div>


</body>
</html>
