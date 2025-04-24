<?php
require_once(__DIR__ . '/starter.php');
require_once(__DIR__ . '/connect_database.php');

$userId = $_SESSION['user']['user_id'];
$membersId = $_SESSION['group'];

if (count($membersId, 1) < 2) {
	redirectToUrl('index.php');
}


$createChatSQL = $mysqlClient->prepare('INSERT INTO chats(`group`) VALUES (:group)');
$createChatSQL->execute([
	'group' => 1,
]);

$chatId = $mysqlClient->lastInsertId();

$createMemberSQL = $mysqlClient->prepare('INSERT INTO members(user_id, chat_id) VALUES (:user_id, :chat_id)');
$createMemberSQL->execute([
	'user_id' => $userId,
	'chat_id' => $chatId
]);

foreach ($membersId as $id) {
	if ($id !== NULL) {
		$createMemberSQL = $mysqlClient->prepare('INSERT INTO members(user_id, chat_id) VALUES (:user_id, :chat_id)');
		$createMemberSQL->execute([
			'user_id' => $id,
			'chat_id' => $chatId
		]);
	}
}

$_SESSION['group'] = [];
redirectToUrl('index.php');