<?php 
abstract class Forme {
    public function dessine() {
        echo "Dessine la forme : " . get_class($this) . "\r\n";
    }
}


class Rectangle extends Forme {
    const TYPE = "RECTANGLE";
    public function dessine() {
        parent::dessine();
        echo "Je suis un " . self::TYPE . "<br>";
    }
}

class Carre extends Forme {
    const TYPE = "CARRE";
    public function dessine() {
        parent::dessine();
        echo "Je suis un " . self::TYPE . "<br>";
    }
}

class Rond extends Forme {
    const TYPE = "ROND";
    public function dessine() {
        parent::dessine();
        echo "Je suis un " . self::TYPE . "<br>";
    }
}


class FormeFactory {
	
    public function getForme($typeForme){
       		
        if($typeForme === Rectangle::TYPE){
            return new Rectangle();
        } else if($typeForme === Carre::TYPE){
            return new Carre();
        } else if($typeForme === Rond::TYPE){
            return new Rond();
        }
       
       return null;
    }

}


$formeFactory = new FormeFactory();

$rectangle = $formeFactory->getForme(Rectangle::TYPE);
$rectangle->dessine();

$carre = $formeFactory->getForme(Carre::TYPE);
$carre->dessine();

$cercle = $formeFactory->getForme(Rond::TYPE);
$cercle->dessine();
?>