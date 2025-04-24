<?php require_once(__DIR__ . '/scripts/starter.php') ?>
<?php require_once(__DIR__ . '/scripts/connect_database.php') ?>
<?php $_SESSION['group'] = [];?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>What's app</title>
</head>
<body>
	
	<div class="<?php echo isset($_SESSION['user']) ? 'index' : 'index index-not-connected'; ?>">
		
	<?php
			require_once(__DIR__ . '/components/header.php');
			
			if (isset($_SESSION['user'])) {
				require_once(__DIR__ . '/components/chats_navbar.php');
				require_once(__DIR__ . '/components/keyboard.php');
				require_once(__DIR__ . '/components/show_messages.php');
			}
			?>

</div>


	<?php if (!isset($_SESSION['user'])) : ?>
		<h1 class="not-connected">
			Aucun message, 
			<a href="pages/login.php">Connectez-vous</a> 
			ou 
			<a href="pages/signin.php">Créez un compte</a> 
			!
		</h1>
	<?php endif ?>

	<script src="main.js"></script>
</body>
</html>



















































<!-- Je souhaite apprendre à apprendre car je veux apprendre plus vite et mieux, ne plus se décourager à réviser une leçon, ne plus être confronté à mon manque de travail, mener à bien mes projets les plus fous, et booster ma confiance d'apprendre, ce qui m'aiderait à lutter contre ma peur de l'inconnu. -->