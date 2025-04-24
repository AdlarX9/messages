<?php require_once(__DIR__ . '/../scripts/starter.php') ?>
<?php require_once(__DIR__ . '/../scripts/connect_database.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css">
	<title>Ajouter un ami</title>
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