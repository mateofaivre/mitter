<?php 

class Moteur {
    private $puissance = null;
    private $nbCylindre = null;
    private $cylindre = null;

    function __construct($nbCv, $nbCylindre, $cylindre) {
        $this->puissance = $nbCv;
        $this->nbCylindre = $nbCylindre;
        $this->cylindre = $cylindre;
    }

    public function getNbCV() {
		return $this->puissance;
	}

    public function getNbCylindre() {
		return $this->nbCylindre;
	}

    public function getCylindre() {
		return $this->cylindre;
	}
}

class Carrosserie {
    private $matiere = null;

    function __construct($matiere) {
        $this->matiere = $matiere;
    }

    public function getMatiere() {
		return $this->matiere;
	}

}

class Voiture {
    private $chassis = null;
	private $carrosserie = null;
    private $moteur = null;
	private $siege = array();
	private $spoiler = null;
	private $roueSecours = null;

	public function __construct($chassis, $moteur, $carrosserie, $typeSiege, $nbSiege=1){
		$this->chassis = $chassis;
		$this->carrosserie = $carrosserie;
		$this->moteur = $moteur;
		for($i=0; $i<$nbSiege; $i++){
            array_push($this->siege, $typeSiege);
        }
    }

	public function setMatiereSiege($matiere){
		for($i=0; $i<count($this->siege); $i++){
			$this->siege[$i] = $matiere;
        }
	}

    public function setSpoiler($spoiler) {
		$this->spoiler = $spoiler;
	}

	public function setRoueSecours($roue) {
		$this->roueSecours = $roue;
	}

	public function getMatiereSiege(){
		if(count($this->siege)>0){
			return $this->siege[0];
		}
		return null;
	}
	
	public function showFicheTechnique() {
        $desc = "<p>Cette voiture dispose d'un moteur d'une puissance de ".$this->moteur->getNbCV()." CV, d'une carrosserie en ".$this->carrosserie->getMatiere().", de ".count($this->siege)." siège(s) en ".$this->getMatiereSiege().". ";
		if(!is_null($this->roueSecours) || !is_null($this->spoiler)){
			$desc .= "<br>Options : <ul>";
			if(!is_null($this->roueSecours)){
				$desc .= "<li>Roue de Secours</li>";
			}
			if(!is_null($this->spoiler)){
				$desc .= "<li>Spoiler</li>";
			}
		}
        echo $desc."</ul></p>";
	}
}


interface VoitureBuilder {
	public function buildSieges($matiere);
    public function buildSpoiler();
	public function buildRoueSecours();
}

class HondaCivicBuilder implements VoitureBuilder {

	private $voiture;

	public function __construct(){
        $this->reset();
    }

    public function reset(){
        $this->voiture = new Voiture("Acier", new Moteur(163, 4, 2.0), new Carrosserie("Acier + Composite"), "Tissu", 4);
    }

	public function buildSieges($matiere) {
		$this->voiture->setMatiereSiege($matiere);
		return $this;
	}

	public function buildSpoiler() {
		$this->voiture->setSpoiler("Aluminium");
		return $this;
	}

	public function buildRoueSecours() {
		$this->voiture->setRoueSecours("Roue galette");
		return $this;
	}

	public function build(): Voiture{
		$result = $this->voiture;
		$this->reset();

        return $result;
    }
}

$builderCivic = new HondaCivicBuilder();

$civic1 = $builderCivic->build();
$civic1->showFicheTechnique();

$civic2 = $builderCivic
					->buildRoueSecours()
					->buildSpoiler()
					->build();
$civic2->showFicheTechnique();

$civic3 = $builderCivic
					->buildSpoiler()
					->buildSieges("Cuir")
					->build();
$civic3->showFicheTechnique();

?>