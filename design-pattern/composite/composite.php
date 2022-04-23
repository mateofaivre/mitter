<?php 

interface Graphic{
    function dessine();
    function description();
}

abstract class Forme implements Graphic{
    private $epaisseur = 1;

    abstract function dessine();
    abstract function description();

    public function setEpaisseur($val){
        $this->epaisseur = $val;
    }

    public function getEpaisseur(){
        return $this->epaisseur;
    }
}


class Point extends Forme{
    private $x;
    private $y;

    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }

    public function dessine(){
        echo "Action qui dessine un point<br>";
    }

    public function description(){
        return "Point en x : ".$this->x." | y : ".$this->y." de largeur : ".$this->getEpaisseur();
    }
    
}

class Cercle extends Forme{
    private $x;
    private $y;
    private $rayon;

    public function __construct($x, $y, $rayon){
        $this->x = $x;
        $this->y = $y;
        $this->rayon = $rayon;
    }

    public function dessine(){
        echo "Action qui dessine un cercle<br>";
    }

    public function description(){
        return "Cercle en x: ".$this->x." et y: ".$this->y." de rayon: ".$this->rayon.", trait d'epaisseur : ".$this->getEpaisseur();
    }

}

class Ligne extends Forme{
    private $p1;
    private $p2;

    public function __construct(Point $p1, Point $p2){
        $this->p1 = $p1;
        $this->p2 = $p2;
    }

    public function dessine(){
        echo "Action qui dessine une ligne droite<br>";
    }

    public function description(){
        return "Ligne droite entre le ".$this->p1->description()." et le ".$this->p2->description()." d'epaisseur : ".$this->getEpaisseur();
    }

}


class Calque implements Graphic{

    private $arrayGraphic = array();

    public function ajoute(Graphic ...$elts){
        foreach ($elts as $elt) {
            array_push($this->arrayGraphic, $elt);
        }
    }

    public function supprime(Graphic $elt){
        if (($key = array_search($elt, $this->arrayGraphic)) !== false) {
            unset($this->arrayGraphic[$key]);
        }
    }

    public function dessine(){
        foreach($this->arrayGraphic as $key => $value){
            $value->dessine();
        }
    }

    public function description(){
        $res = "";
        foreach($this->arrayGraphic as $key => $value){
            $res .= $value->description()."\n";
        }
        return $res;
    }

}



$mainCalque = new Calque();
$mainCalque->ajoute( new Point(18,5) );

$calque1 = new Calque();
$mainCalque->ajoute( $calque1 );
$calque1->ajoute( 
    new Point(0, 0), 
    new Ligne( new Point(-4, 15), new Point(18, 3) ), 
    new Cercle(44, 125, 22) 
);


$mainCalque->dessine();
echo "<br>";
echo nl2br($mainCalque->description());

?>