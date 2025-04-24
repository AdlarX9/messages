<?php
require_once(__DIR__ . '/starter.php');
require_once(__DIR__ . '/connect_database.php');

$data = $_POST;

// Vérification si l'utilisateur existe dans la base de données
$getUserSQL = $mysqlClient->prepare('SELECT user_id, email, password FROM users WHERE email = :email');
$getUserSQL->execute([
	'email' => $data['email']
]);
$user = $getUserSQL->fetch();

if ($user && $data['password'] === $user['password']) {
    // Authentification réussie
    $_SESSION['user'] = [
        'user_id' => $user['user_id'],
        'email' => $user['email'],
    ];
}

redirectToUrl('index.php');