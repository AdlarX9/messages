<?php require_once(__DIR__ . '/../scripts/starter.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css">
	<title>Sign in</title>
</head>
<body>
<?php require_once(__DIR__ . '/../components/header.php') ?>

	<form action="<?php echo $root; ?>/scripts/signin_exe.php" method="POST" class="log-form signin">

		<div class="form-section">
			<label>Username</label>
			<input type="text" name="username" placeholder="John DOE">
		</div>

		<div class="form-section">
			<label>Description</label>
			<input type="textarea" name="description" placeholder="Je suis ici pour discuter !">
		</div>

		<div class="form-section">
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="you@exemple.com">
		</div>

		<div class="form-section">
			<label for="password">Mot de passe</label>
			<input type="password" name="password">
		</div>

		<button type="submit" class="submit-btn">Envoyer</button>

		<p>Vous avez déjà un compte ? <a href="<?php echo $root . '/pages/login.php' ?>">Connectez-vous !</a></p>

	</form>
	<script src="<?php echo $root; ?>/scripts/manage_plus.js"></script>
</body>
</html>