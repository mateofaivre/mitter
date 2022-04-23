<?php

namespace Fateal;


if ( class_exists( 'Fateal\Config' ) ) {
	return;
}



class Config {
	
	protected static $instance;
	
	const THEME_PATH					= __DIR__ . '/../../../';
	const CONFIG_LOCAL_FILE_PATH		= self::THEME_PATH . 'configs/config-local.json';
	const CONFIG_PROJECT_FILE_PATH		= self::THEME_PATH . 'configs/config-project.json';
	const CONFIG_SECRET_KEY_FILE_PATH	= self::THEME_PATH . 'configs/config-secret-key.json';
	const CONFIG_PLUGINS_FILE_PATH		= self::THEME_PATH . 'configs/config-plugins.json';
	
	static $DEV							= null;
	static $PREPROD						= null;
	static $PROD						= null;
	static $ENV							= null;
	static $WP_DEBUG					= null;
	static $ACFE_DEV					= null;
	static $GA							= null;
	static $DB_OPTS						= null;
	static $VERSION						= null;
	static $SECRET_KEYS					= null;
	static $ACF_PRO_KEY					= null;
	static $MIGRATE_DB_PRO_KEY			= null;
	
	private $config						= null;
	
	
	protected function __construct() {
		$this->setConfig();
		$this->setEnv();
		$this->setVersion();
	}
	
	
	public static function getInstance() {
		if ( !isset( self::$instance ) )
			self::$instance = new self;

		return self::$instance;
	}
	
	
	private function getConfigFile( $path, $displayError = true ) {
		if ( ! file_exists( $path ) ) {
			// throw new ErrorException( 'Config file is missing! "' . $path . '" not found' );
			if ( $displayError )
				echo '<br>Config file is missing! "' . $path . '" not found.<br>';

			return false;
		}

		$config = file_get_contents( $path );
		$config = json_decode( $config );


		return $config;
	}
	
	
	private function setConfig() {
		$localConfig	= $this->getConfigFile( self::CONFIG_LOCAL_FILE_PATH );
		$this->config	= $this->getConfigFile( self::CONFIG_PROJECT_FILE_PATH );
		
		$this->config->HOST->DEV = $localConfig->HOST->DEV;
	}
	
	
	private function setEnv() {
		self::$DEV		= in_array( $_SERVER[ 'HTTP_HOST' ], $this->config->HOST->DEV );
		self::$PREPROD	= in_array( $_SERVER[ 'HTTP_HOST' ], $this->config->HOST->PREPROD );
		self::$PROD		= in_array( $_SERVER[ 'HTTP_HOST' ], $this->config->HOST->PROD );

		if ( self::$PROD )
			self::$ENV = 'PROD';
		else if ( self::$PREPROD )
			self::$ENV = 'PREPROD';
		else if ( self::$DEV )
			self::$ENV = 'DEV';
		else if ( empty( $_SERVER[ 'HTTP_HOST' ] ) ) // necessary for the installation
			self::$ENV = 'DEV';
		else {
			echo '<br>Can\'t define the environment! Verify your HOST setting.<br>';
			exit();
		}
	}
	
	
	private function setVersion() {
		self::$VERSION = isset( $this->config->VERSION ) && !empty( $this->config->VERSION ) ? $this->config->VERSION : '???';
	}
	
}

