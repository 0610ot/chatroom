<?php
$errors = array();

// エラーがないか、true or falseで返す
$valid_conversation = (isset($_GET['conversation_id']) && validate_conversation_id($_GET['conversation_id'], $mysqli));

if ($valid_conversation === false) {
	$errors[] = "IDエラーが発生しました";
}

if (isset($_POST['message'])) {
	if (empty($_POST['message'])) {
		$errors[] = "メッセージを入力してください。";
	}
	if (empty($errors)) {
		add_conversation_message($_GET['conversation_id'], $_POST['message'], $mysqli);
	}
}

if (!empty($errors)) {
	foreach ($errors as $error) {
		echo $error;
	}
}

if ($valid_conversation) {

	if (isset($_POST['message'])) {
		update_conversation_last_view($_GET['conversation_id'], $mysqli);
		$messages = fetch_conversation_messages($_GET['conversation_id'], $mysqli);
	} else {
		$messages = fetch_conversation_messages($_GET['conversation_id'], $mysqli);
		update_conversation_last_view($_GET['conversation_id'], $mysqli);
	}

	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MY CHATROOM</title>
<link rel="stylesheet" type="text/css" href="../css/new.css">
<link rel="stylesheet" type="text/css" href="../css/chat.css">
</head>
<body>
	<div id='chat-main'>
		<div class="link-inbox">
			<li>
			 <a class="link-color" href="index.php?page=inbox">受信ボックス</a>
			</li>
			<li>
			 <a class="link-color2" href="logout.php?logout">ログアウト</a>
			</li>
		</div>
		<div id='form'>
      <div id='form-main'>
        <div id='form-box'>
          <form class="new_message" id="new_message"  method="post">
            <input name="name" type="hidden" value="" />
            <input type="hidden" name="" value="" />
            <input class="form-font" placeholder="type a message" type="text" name="message" id="message_content" />
            <label class="form-image" for="message_image">
              <i class="fa fa-image far"></i>
              <input class="form-fa" type="file" name="" id="message_image" />
            </label>
              <input id="form-send" type="submit" name="commit" value="Send"  data-disable-with="Send" />
          </form>
        </div>
      </div>
    </div>

    <div id='messages'>
			<?php foreach ($messages as $message) { ?>
				<style>
					.unread { font-weight: bold; }

				</style>
				<div id="inbox" class="<?php if ($message['message_unread']) { echo 'unread'; } ?>">
					<div class="chatting">
		       <div class="says">
					<p class="n-time"><?php echo $message['user_name'] ?>（<?php echo date('y/m/d H:i:s', $message['message_date']) ?>）</p>
					<p><?php echo $message['message_text'] ?></p>
				</div>

			<?php } // End of foreach


		} // End of if ?>

			 </div>
			</div>
    </div>


  </div>

</body>
</html>
