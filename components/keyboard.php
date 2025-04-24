<?php if (isset($_GET['chat_id'])) : ?>
	<form action="scripts/add_message.php" method="POST" class="keyboard">
		<input type="textarea" name="message" class="message-preview" value="">
		<input type="hidden" name="chat_id" value="<?php echo $_GET['chat_id'] ?>">
		<button type="submit" class="submit-btn" id="send-message">></button>
	</form>
<?php endif ?>