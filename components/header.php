<section class="header">
	<div class="header-ordi">
		<div class="log-pages">
			<a href="<?php echo $root . '/index.php'; ?>">What's app</a>
			<?php
				if (isset($_SESSION['user'])) {
					echo "<a href='{$root}/scripts/logout.php'>Déconnexion</a>";
				} else {
					echo "
						<a href='{$root}/pages/signin.php'>Créer un compte</a>
						<a href='{$root}/pages/login.php'>Se connecter</a>
					";
				}
			?>
		</div>
		<?php
			if (isset($_SESSION['user'])) {
				echo "
					<div class='plus'>
						<div class='vertical'></div>
						<div class='horizontal'></div>
						<div class='deroulant'>
							<a href='{$root}/pages/add_friend.php' class='plus-link'>Ajouter un ami</a>
							<a href='{$root}/pages/create_group.php' class='plus-link'>Créer un groupe</a>
						</div>
					</div>
				";
			}
		?>
	</div>
	<div class="header-mobile">
		<div class="show-conv"><</div>
		<div class="plus">
			<div class="vertical"></div>
			<div class="horizontal"></div>
			<div class="deroulant">
				<a href="<?php echo $root; ?>">What's app</a>
				<?php
					echo isset($_SESSION['user']) ? "
						<a href='{$root}/pages/add_friend.php' class='plus-link'>Ajouter un ami</a>
						<a href='{$root}/pages/create_group.php' class='plus-link'>Créer un groupe</a>
						<a href='{$root}/scripts/logout.php' class='plus-link'>Déconnexion</a>
					" : "
						<a href='{$root}/pages/signin.php'>Créer un compte</a>
						<a href='{$root}/pages/login.php'>Se connecter</a>
					";
				?>
			</div>
		</div>
	</div>
	<script src="<?php echo $root; ?>/scripts/manage_plus.js"></script>
</section>