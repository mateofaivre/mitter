<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/header/php/header.php" );
?>

	<body class="body body--login">
	<div class="main__wrapper main__wrapper--login">
		<h1>Connectez-vous à Mitter</h1>
		<form action="login-action.php" method="post" class="login__form">
			<label for="login__input--email" class="login__label login__label--email">Email</label>
			<input type="email" name="login_email" id="login__input--email" class="login__input login__input--email" required>
			<label for="login__input--password" class="login__label login__label--password">Mot de passe</label>
			<input type="password" name="login_password" id="login__input--password" class="login__input login__input--password" required>
			<input type="submit" name="login_submit" class="login__input login__input--submit">
		</form>
		<div class="login__signup">
			Vous n'avez pas de compte ?
			<a class="login__link login__link--signup" href="/app/components/pages/signup/php/signup.php">Inscrivez vous</a>
		</div>
	</div>

	</body>
<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/footer/php/footer.php" );