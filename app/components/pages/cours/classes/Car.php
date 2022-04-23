<?php

class Car extends Vehicle {
	private $coffreSize;
	
	const wheel_number = 4;
	private static $_nbCarsInstanced = 0;
	
	public function __construct( $var1, $var2, $var3 ) {
		parent::__construct( $var1, $var2 );
		
		$this->coffreSize = $var3;
		
		self::$_nbCarsInstanced++;
		self::showNbInstance();
	}
	
	public function setCoffreSize($size) {
		$this->coffreSize = $size;
	}
	
	public function getCoffreSize() {
		return $this->coffreSize . " L";
	}
	
	
	public static function showNbInstance() {
		echo '<br>il y a ' . self::$_nbCarsInstanced . " instance(s) de la class Car";
	}
}