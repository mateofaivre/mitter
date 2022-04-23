<script type='text/javascript'>
	var GRH_Config = {
		// SITE_URL:	'',
		THEME_URL:  'app/',
		IS_DEV:     "<?php echo $config::$DEV === true ? 'true' : 'false'; ?>",
		IS_PREPROD: "<?php echo $config::$PREPROD === true ? 'true' : 'false'; ?>",
		IS_PROD:    "<?php echo $config::$PROD === true ? 'true' : 'false'; ?>"
	};
</script>
<script type='text/javascript' src="<?php
$_SERVER[ 'DOCUMENT_ROOT' ] ?>/app/assets/dist/js/scripts.js?v=<?php
echo $config::$VERSION ?>"></script>
