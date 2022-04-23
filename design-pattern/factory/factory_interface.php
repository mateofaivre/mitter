<?php

interface Forme {
	public function dessine();
}


class Rectangle implements Forme {
	const TYPE = "RECTANGLE";
	
	public function dessine() {
		echo "Dessine un " . self::TYPE . "\r\n";
	}
}

class Carre implements Forme {
	const TYPE = "CARRE";
	
	public function dessine() {
		echo "Dessine un " . self::TYPE . "\r\n";
	}
}

class Rond implements Forme {
	const TYPE = "ROND";
	
	public function dessine() {
		echo "Dessine un " . self::TYPE . "\r\n";
	}
}


class FormeFactory {
	
	public function getForme( $typeForme ) {
		
		if ( $typeForme === Rectangle::TYPE ) {
			return new Rectangle();
		} else if ( $typeForme === Carre::TYPE ) {
			return new Carre();
		} else if ( $typeForme === Rond::TYPE ) {
			return new Rond();
		}
		
		return null;
	}
	
}


$formeFactory = new FormeFactory();

$rectangle = $formeFactory->getForme( Rectangle::TYPE );
$rectangle->dessine();

$carre = $formeFactory->getForme( Carre::TYPE );
$carre->dessine();

$cercle = $formeFactory->getForme( Rond::TYPE );
$cercle->dessine();
?>