<?php require_once(__DIR__ . '/../scripts/starter.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
		<!-- inside -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Log in</title>
		<meta
			name="description"
			content="Log in to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<link rel="canonical" href="https://messages.alexis-larose.com/pages/login.php" />

		<!-- Open Graph -->
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://messages.alexis-larose.com/pages/login.php" />
		<meta property="og:title" content="Log in" />
		<meta
			property="og:description"
			content="Log in to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<meta property="og:image" content="https://messages.alexis-larose.com/favicon/logo.png" />
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />

		<!-- Twitter Card -->
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@SpiderManMaGeul" />
		<meta name="twitter:creator" content="@SpiderManMaGeul" />
		<meta name="twitter:title" content="Log in" />
		<meta
			name="twitter:description"
			content="Log in to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<meta name="twitter:image" content="https://messages.alexis-larose.com/favicon/logo.png" />

		<!-- json-ld -->
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "WebSite",
				"url": "https://messages.alexis-larose.com/pages/login.php",
				"name": "Log in",
				"description": "Log in to Messages, the PHP messaging app to chat with your dearest friends...",
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
		<meta name="apple-mobile-web-app-title" content="Log in" />
		<link rel="manifest" href="/favicon/site.webmanifest" />

		<link rel="stylesheet" href="../style.css">
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