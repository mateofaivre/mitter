<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/utils/load-classes/load-classes.php" );

?>
<!doctype html>
<?php
require "header-config.php"; ?>

<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

	<title>Mitter</title>
	<meta name="description" content="WebGL starter"/>
	<meta name="robots" content="index, follow"/>
	<meta name="author" content="Matéo Faivre"/>
	<meta name="designer" content="Matéo Faivre"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.1/css/all.css" type="text/css">
	<link media="screen" rel="stylesheet" type="text/css" href="/app/assets/dist/css/styles.min.css"/>
	<?php
	if ( isset( $script_path ) ) {
		?>
		<script src="/app/components/<?php
		echo $script_path; ?>.js"></script>
		<?php
	}
	?>
</head>