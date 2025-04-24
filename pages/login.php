<?php require_once(__DIR__ . '/../scripts/starter.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css">
	<title>Log in</title>
</head>
<body>
	<?php require_once(__DIR__ . '/../components/header.php') ?>
	<form action="<?php echo $root; ?>/scripts/login_exe.php" method="POST" class="log-form">

		<div class="form-section">
			<label>Email</label>
			<input type="email" name="email" placeholder="you@exemple.com">
		</div>
		
		<div class="form-section">
			<label>Mot de passe</label>
			<input type="password" name="password">
		</div>

		<button type="submit" class="submit-btn">Envoyer</button>

		<p>Vous n'avez pas de compte ? <a href="<?php echo $root . '/pages/signin.php' ?>">Créez-en un !</a></p>

	</form>
	<script src="<?php echo $root; ?>/scripts/manage_plus.js"></script>
</body>
</html>