<?php

require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/utils/load-classes/load-classes.php" );
session_start();

//$login = new Login();
//$login->checkLogin() == true ? exit( header( "Location: /" ) ) : "";
?>


<h1>Signup</h1>

<form action="signup-action.php" method="post">
	<input type="email" name="email">
	<input type="firstname" name="firstname">
	<input type="lastname" name="lastname">
	<input type="username" name="username">
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>

<a href="/app/components/pages/login/php/login-action.php">Login</a>
