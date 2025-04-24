<?php
require_once(__DIR__ . '/starter.php');
require_once(__DIR__ . '/connect_database.php');

$message = trim(strip_tags($_POST['message']));
$chatId = $_POST['chat_id'];

if (!isset($_SESSION['user']) || empty($message)) {redirectToUrl("index.php?chat_id={$chatId}"); }

$sendMessage = $mysqlClient->prepare('INSERT INTO messages(user_id, chat_id, content) VALUES (:user_id, :chat_id, :content)');
$sendMessage->execute([
	'user_id' => $_SESSION['user']['user_id'],
	'chat_id' => $chatId,
	'content' => $message,
]);

redirectToUrl("index.php?chat_id={$chatId}");