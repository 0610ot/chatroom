<?php

$errors = array();

if (isset($_GET['delete_conversation'])){
	if (validate_conversation_id($_GET['delete_conversation'], $mysqli) === false ) {
		$errors[] = "削除IDエラーが発生しました。";
	}
	if (empty($errors)) {
		delete_conversation($_GET['delete_conversation'], $mysqli);
	}
}

$conversations = fetch_conversation_summery($mysqli);
if (empty($conversations)) {
	$errors[] = "メッセージがありません";
}
if (!empty($errors)) {
	foreach ($errors as $error) {
		echo $error;
	}
}
?>

<div class="link-inbox">
	<li>
   <a class="link-color" href="index.php?page=new_conversation">New message</a>
  </li>
	<li>
   <a class="link-color2" href="logout.php?logout">Logout</a>
 </li>
</div>
<div class="new_con">
<?php foreach ($conversations as $conversation) { ?>

<style type="text/css">
	.unread{font-weight:bold;}
</style>
	<div class="<?php if ($conversation['conversation_unread']) { echo 'unread'; } ?>" id="inbox">
		<p>
			<!-- 下記の部分を追加 -->
			<a href="index.php?page=view_conversation&amp;conversation_id=<?php echo $conversation['conversation_id'] ?>"><?php echo $conversation['conversation_subject'] ?></a>
			<a href="index.php?page=inbox&amp;delete_conversation=<?php echo $conversation['conversation_id'] ?>">【削除】</a>
		</p>
		<p class="time">Last Reply: <?php echo date('y/m/d H:i:s', $conversation['conversation_last_reply']) ?></p>
	</div>


<?php } ?>
</div>
