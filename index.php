<?php require_once(__DIR__ . '/scripts/starter.php') ?>
<?php require_once(__DIR__ . '/scripts/connect_database.php') ?>
<?php $_SESSION['group'] = [];?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- inside -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Messages</title>
		<meta
			name="description"
			content="A PHP messaging app to chat with your dearest friends..."
		/>
		<link rel="canonical" href="https://messages.alexis-larose.com/" />

		<!-- Open Graph -->
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://messages.alexis-larose.com/" />
		<meta property="og:title" content="Messages" />
		<meta
			property="og:description"
			content="A PHP messaging app to chat with your dearest friends..."
		/>
		<meta property="og:image" content="https://messages.alexis-larose.com/favicon/logo.png" />
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />

		<!-- Twitter Card -->
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@SpiderManMaGeul" />
		<meta name="twitter:creator" content="@SpiderManMaGeul" />
		<meta name="twitter:title" content="Messages" />
		<meta
			name="twitter:description"
			content="A PHP messaging app to chat with your dearest friends..."
		/>
		<meta name="twitter:image" content="https://messages.alexis-larose.com/favicon/logo.png" />

		<!-- json-ld -->
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "WebSite",
				"url": "https://messages.alexis-larose.com/",
				"name": "Messages",
				"description": "A PHP messaging app to chat with your dearest friends...",
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
		<meta name="apple-mobile-web-app-title" content="Messages" />
		<link rel="manifest" href="/favicon/site.webmanifest" />

		<link rel="stylesheet" href="style.css">
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