<?php require_once(__DIR__ . '/../scripts/starter.php') ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- inside -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Sign in</title>
		<meta
			name="description"
			content="Sign in to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<link rel="canonical" href="https://messages.alexis-larose.com/pages/signin.php" />

		<!-- Open Graph -->
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://messages.alexis-larose.com/pages/signin.php" />
		<meta property="og:title" content="Sign in" />
		<meta
			property="og:description"
			content="Sign in to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<meta property="og:image" content="https://messages.alexis-larose.com/favicon/logo.png" />
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />

		<!-- Twitter Card -->
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@SpiderManMaGeul" />
		<meta name="twitter:creator" content="@SpiderManMaGeul" />
		<meta name="twitter:title" content="Sign in" />
		<meta
			name="twitter:description"
			content="Sign in to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<meta name="twitter:image" content="https://messages.alexis-larose.com/favicon/logo.png" />

		<!-- json-ld -->
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "WebSite",
				"url": "https://messages.alexis-larose.com/pages/signin.php",
				"name": "Sign in",
				"description": "Sign in to Messages, the PHP messaging app to chat with your dearest friends...",
				"publisher": {
					"@type": "Organization",
					"name": "Alexis Larose",
					"logo": { "@type": "ImageObject", "url": "https://messages.alexis-larose.com/favicon/logo.png" }
				}
			}
		</script>

		<!-- favicon -->
		<link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
		<link rel="shortcut icon" href="/favicon/favicon.ico" />
		<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
		<meta name="apple-mobile-web-app-title" content="Sign in" />
		<link rel="manifest" href="/favicon/site.webmanifest" />

		<link rel="stylesheet" href="../style.css">
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