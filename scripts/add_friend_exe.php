<?php
require_once(__DIR__ . '/starter.php');
require_once(__DIR__ . '/connect_database.php');

$ids = [
	$_POST['friend_id'],
	$_SESSION['user']['user_id']
];



$sql = "SELECT COUNT(*) AS count_same_chat 
		FROM members 
		WHERE chat_id IN (
			SELECT chat_id 
			FROM members 
			WHERE user_id = :user1_id
		) 
		AND user_id = :user2_id";

$statement = $mysqlClient->prepare($sql);
$statement->execute([
	'user1_id' => $ids[0],
	'user2_id' => $ids[1]
]);

$row = $statement->fetch();
$countSameChat = $row['count_same_chat'];

if ($countSameChat > 0) {
	redirectToUrl('index.php');
}


$createChatSQL = $mysqlClient->prepare('INSERT INTO chats(`group`) VALUES (:group)');
$createChatSQL->execute([
	'group' => 0,
]);

$chatId = $mysqlClient->lastInsertId();

foreach ($ids as $id) {
	$createMemberSQL = $mysqlClient->prepare('INSERT INTO members(user_id, chat_id) VALUES (:user_id, :chat_id)');
	$createMemberSQL->execute([
		'user_id' => $id,
		'chat_id' => $chatId
	]);
}

redirectToUrl('index.php');