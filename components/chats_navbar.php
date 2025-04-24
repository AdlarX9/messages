<?php
$chatsSQL = $mysqlClient->prepare('
	WITH RankedMessages AS (
		SELECT
			chat_id,
			user_id,
			content,
			timestamp,
			ROW_NUMBER() OVER (PARTITION BY chat_id ORDER BY timestamp DESC) AS rn
		FROM messages
	)
	SELECT
		u.username,
		u.description,
		m.chat_id,
		rm.content AS last_message_content,
		rm.timestamp AS last_message_timestamp
	FROM
		members m
	INNER JOIN
		users u ON m.user_id = u.user_id
	LEFT JOIN
		RankedMessages rm ON m.chat_id = rm.chat_id AND rm.rn = 1
	WHERE
		m.chat_id IN (
			SELECT chat_id
			FROM members
			WHERE user_id = :user_id
		) AND m.user_id != :user_id
	ORDER BY
		rm.timestamp DESC;
');
$chatsSQL->execute([
	'user_id' => $_SESSION['user']['user_id'],
]);

$chats = $chatsSQL->fetchAll();
$group = [];
$lastId = null;

foreach ($chats as $friend) {
	if ($lastId === null) {
		$lastId = 0;
	}
	if ($lastId !== $friend['chat_id']) {
		$group[] = [
			'chat_id' => $friend['chat_id'],
			'users' => [],
			'last_message' => $friend['last_message_content']
		];
	}

	$group[count($group) - 1]['users'][] = $friend['username'];
	$lastId = $friend['chat_id'];
}
?>


<div class="chats-navbar">
	<div class="chat-remplissage">Conversations</div>

	<?php foreach ($group as $chatGroup) : ?>
		<form action="index.php" method="GET">
			<input type="hidden" name="chat_id" value="<?php echo $chatGroup['chat_id']; ?>">
			<button type="submit" class="show-chat">

				<div class="name-wrapper">
					<?php foreach ($chatGroup['users'] as $username) : ?>
						<p class="name"><?php echo $username; ?></p>
					<?php endforeach ?>
				</div>

				<p class="last-message"><?php echo $chatGroup['last_message']; ?></p>

			</button>
		</form>
	<?php endforeach ?>
	<?php if (count($group) === 0) : ?>
	<?php endif ?>
</div>