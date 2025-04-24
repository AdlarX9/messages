<?php
	if (isset($_GET['chat_id'])) {
		$getAuthorized = $mysqlClient->prepare('
			SELECT chat_id
			FROM members
			WHERE user_id = :user_id
		');
		$getAuthorized->execute([
			'user_id' => $_SESSION['user']['user_id'],
		]);
		$authorized = $getAuthorized->fetchAll();

		$redirectRequired = true;
		foreach ($authorized as $chatId) {
			if ($chatId['chat_id'] == $_GET['chat_id']) {
				$redirectRequired = false;
				break;
			}
		}
	
		if ($redirectRequired) {
			redirectToUrl('index.php');
		}

		$getMessages = $mysqlClient->prepare('
			SELECT u.username, m.user_id, m.content,  DATE_FORMAT(m.timestamp, "%D %b %Y  %T") AS date
			FROM messages m
			INNER JOIN users u ON m.user_id = u.user_id
			WHERE chat_id = :chat_id
			ORDER BY timestamp DESC
		');
		$getMessages->execute([
			'chat_id' => $_GET['chat_id'],
		]);
		$messages = $getMessages->fetchAll();
	}

?>

<section class="show-messages <?php echo isset($_GET['chat_id']) ? '' : 'show-full'; ?>">
	<div class="message-container">
		<?php if (isset($_GET['chat_id'])) : ?>
			<?php foreach ($messages as $message) : ?>
				<div class="message <?php echo $message['user_id'] === $_SESSION['user']['user_id'] ? 'mine' : ''; ?>">
					<p class="author"><?php echo $message['username']; ?></p>
					<div class="message-content-wrapper">
						<div class="message-content">
							<p class="content"><?php echo $message['content']; ?></p>
						</div>
					</div>
					<p class="date"><?php echo $message['date']; ?></p>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
	<?php if (!isset($_GET['chat_id'])) : ?>
		<p class="message-login">Aucun message, séléctionnez une conversation</p>
	<?php endif ?>
</section>