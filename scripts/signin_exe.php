<?php
require_once(__DIR__ . '/starter.php');
require_once(__DIR__ . '/connect_database.php');


$data = $_POST;

if (!isset($_SESSION['user'])) {

	$emailsSQL = $mysqlClient->prepare('
		SELECT email
		FROM users
	');
	$emailsSQL->execute();
	$emails = $emailsSQL->fetchAll();

	foreach ($emails as $email) {
		if (
				$email === $data['email'] ||
				empty(trim($data['username'])) ||
				empty(trim($data['description'])) ||
				empty($data['email']) ||
				empty($data['password'])
			) {
			redirectToUrl('/page/signin.php');
		}
	}

	$createUserSQL = $mysqlClient->prepare('
		INSERT INTO 
		users(username, email, password, avatar, description, connected) 
		VALUES (:username, :email, :password, :avatar, :description, :connected)
	');

	$createUserSQL->execute([
		'username' => $data['username'],
		'email' => $data['email'],
		'password' => $data['password'],
		'avatar' => 'pas d\'avatar',
		'description' => $data['description'],
		'connected' => 0,
	]);

	$userId = $mysqlClient->lastInsertId();

	$_SESSION['user'] = [
		'user_id' => $userId,
		'email' => $data['email']
	];

	redirectToUrl('index.php');
}
redirectToUrl('pages/signin.php');