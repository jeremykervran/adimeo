<div class="adimeo-menu-wrapper">
	<h1>Permissions</h1>
	<form action="<?php home_url(); ?>" method="POST">
		<h2>Utilisateur :</h2>
		<?php wp_dropdown_users([
			'orderby' => 'id',
			'order' => 'ASC',
			'show' => 'user_login',
		]); ?>
		<h2>Permissions de l'utilisateur</h2>
		<input type="submit" name="submit" value="Modifier les permissions" />
	</form>

</div>