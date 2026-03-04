<?php require_once(__DIR__ . '/../scripts/starter.php') ?>
<?php require_once(__DIR__ . '/../scripts/connect_database.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
		<!-- inside -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Add a friend</title>
		<meta
			name="description"
			content="Add a friend to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<link rel="canonical" href="https://messages.alexis-larose.com/pages/add_friend.php" />

		<!-- Open Graph -->
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://messages.alexis-larose.com/pages/add_friend.php" />
		<meta property="og:title" content="Add a friend" />
		<meta
			property="og:description"
			content="Add a friend to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<meta property="og:image" content="https://messages.alexis-larose.com/favicon/logo.png" />
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />

		<!-- Twitter Card -->
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@SpiderManMaGeul" />
		<meta name="twitter:creator" content="@SpiderManMaGeul" />
		<meta name="twitter:title" content="Add a friend" />
		<meta
			name="twitter:description"
			content="Add a friend to Messages, the PHP messaging app to chat with your dearest friends..."
		/>
		<meta name="twitter:image" content="https://messages.alexis-larose.com/favicon/logo.png" />

		<!-- json-ld -->
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "WebSite",
				"url": "https://messages.alexis-larose.com/pages/add_friend.php",
				"name": "Add a friend",
				"description": "Add a friend to Messages, the PHP messaging app to chat with your dearest friends...",
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
		<meta name="apple-mobile-web-app-title" content="Add a friend" />
		<link rel="manifest" href="/favicon/site.webmanifest" />

		<link rel="stylesheet" href="../style.css">
</head>
<body>
	<?php require_once(__DIR__ . '/../components/header.php') ?>
	<form action="<?php echo $root; ?>/pages/add_friend.php" method="GET" class="log-form">

		<div class="form-section">
			<label>Username</label>
			<input type="text" name="username" placeholder="John DOE">
		</div>

		<button type="submit" class="submit-btn">Rechercher</button>

	</form>
	
	<?php if(isset($_GET['username'])) : ?>
		<?php
			$search = $_GET['username'];

			$friendsSQL = $mysqlClient->prepare("
				SELECT username, description, user_id FROM users
				WHERE username LIKE CONCAT('%', :username, '%')
			");
			$friendsSQL->execute([
				'username' => $search
			]);
			$friends = $friendsSQL->fetchAll();
		?>
		<section class="show-friends">
			<?php foreach ($friends as $friend) { ?>

				<form action="../scripts/add_friend_exe.php" method="POST">
					<input type="hidden" name="friend_id" value="<?php echo $friend['user_id']; ?>">
					<button type="submit" class="searched-friend">
						<div class="username"><?php echo $friend['username'] ?></div>
						<div class="description"><?php echo $friend['description'] ?></div>
					</button>
				</form>

			<?php } ?>
			<?php if ($friends === []) {echo '<p class="nothing">Aucun utilisateur trouvé</p>';} ?>
		</section>
	<?php endif ?>

	<script src="<?php echo $root; ?>/scripts/manage_plus.js"></script>
</body>
</html>