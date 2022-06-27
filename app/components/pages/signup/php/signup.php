<?php

require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/utils/load-classes/load-classes.php" );
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/header/php/header.php" );

//$login = new Login();
//$login->checkLogin() == true ? exit( header( "Location: /" ) ) : "";
?>

<body class="body body--signup">
<div class="main__wrapper main__wrapper--signup">
	<h1>S'inscrire</h1>

	<form action="signup-action.php" method="post" class="signup__form">
		<label for="signup__input--email" class="signup__label signup__label--email">Email</label>
		<input type="email" name="email">

		<label for="signup__input--email" class="signup__label signup__label--firstname">Prénom</label>
		<input type="text" name="firstname">

		<label for="signup__input--lastname" class="signup__label signup__label--lastname">Nom</label>
		<input type="text" name="lastname">

		<label for="signup__input--username" class="signup__label signup__label--username">Nom d'utilisateur</label>
		<input type="text" name="username">

		<label for="signup__input--password" class="signup__label signup__label--password">Mot de passe</label>
		<input type="password" name="password">

		<input type="submit" name="signup_submit" class="signup__input signup__input--submit" value="S'inscrire">
	</form>
	<div class="signup__login">
		Vous avez déjà un compte ?
		<a class="signup__link signup__link--login" href="/app/components/pages/login/php/login.php">Se connecter</a>
	</div>
</div>


</body>
