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

	public function setChassis($chassis) {
		$this->chassis = $chassis;
	}

	public function setCarrosserie($carrosserie) {
		$this->carrosserie = $carrosserie;
	}

    public function setMoteur($moteur) {
		$this->moteur = $moteur;
	}
    
	public function setSiege($siege, $nb=1) {
        for($i=0; $i<$nb; $i++){
            array_push($this->siege, $siege);
        }
	}

    public function setSpoiler($spoiler) {
		$this->spoiler = $spoiler;
	}
	
	public function showFicheTechnique() {
        $desc = "Cette voiture dispose d'un moteur d'une puissance de ".$this->moteur->getNbCV()." CV, d'une carrosserie en ".$this->carrosserie->getMatiere().", de ".count($this->siege)." siège(s). ";
		if(!is_null($this->spoiler)){
            $desc .= "Cette voiture dispose en option d'un spoiler. ";
        }
        echo $desc."<br>";
	}
}


interface VoitureBuilder {
    public function buildChassis($matiere);
    public function buildMoteur($moteur);
	public function buildCarrosserie($carrosserie);
	public function buildSiege($matiere, $nb);
	public function buildSpoiler($matiere);
}

class SuvBuilder implements VoitureBuilder {

	private $voiture;

	public function __construct(){
        $this->reset();
    }

    public function reset(){
        $this->voiture = new Voiture();
    }
	
	public function buildChassis($matiere) {
		$this->voiture->setChassis($matiere);
	}

	public function buildMoteur($moteur) {
		$this->voiture->setMoteur($moteur);
	}

	public function buildCarrosserie($carrosserie) {
		$this->voiture->setCarrosserie($carrosserie);
	}
	
	public function buildSiege($matiere, $nb) {
		$this->voiture->setSiege($matiere, $nb);
	}

	public function buildSpoiler($matiere) {
		$this->voiture->setSpoiler($matiere);
	}

	public function getResult(): Voiture{
        $result = $this->voiture;
        $this->reset();

        return $result;
    }
}

class ManuelUtilisateur {
    private $chassis = null;
	private $carrosserie = null;
    private $moteur = null;
	private $siege = array();
	private $spoiler = null;

	public function setChassis($chassis) {
		$this->chassis = $chassis;
	}

	public function setCarrosserie($carrosserie) {
		$this->carrosserie = $carrosserie;
	}

    public function setMoteur($moteur) {
		$this->moteur = $moteur;
	}
    
	public function setSiege($siege, $nb=1) {
        for($i=0; $i<$nb; $i++){
            array_push($this->siege, $siege);
        }
	}

    public function setSpoiler($spoiler) {
		$this->spoiler = $spoiler;
	}
	
	public function showCarnetEntretien() {
        if($this->moteur->getCylindre() < 2.0){
			echo "Distribution à remplacer tous les 100.000 km";
		} else {
			echo "Distribution à remplacer tous les 140.000 km";
		}
        echo "<br>";
	}
}

class ManuelUtilisateurBuilder implements VoitureBuilder {

	private $manuel;

	public function __construct(){
        $this->reset();
    }

    public function reset(){
        $this->manuel = new ManuelUtilisateur();
    }
	
	public function buildChassis($matiere) {
		$this->manuel->setChassis($matiere);
	}

	public function buildMoteur($moteur) {
		$this->manuel->setMoteur($moteur);
	}

	public function buildCarrosserie($carrosserie) {
		$this->manuel->setCarrosserie($carrosserie);
	}
	
	public function buildSiege($matiere, $nb) {
		$this->manuel->setSiege($matiere, $nb);
	}

	public function buildSpoiler($matiere) {
		$this->manuel->setSpoiler($matiere);
	}

	public function getResult(): ManuelUtilisateur{
        $result = $this->manuel;
        $this->reset();

        return $result;
    }
}


class Atelier {
	private $builder;

    public function setBuilder($builder) {
        $this->builder = $builder;
	}

	private function checkBuilderNotNull(){
		if(is_null($this->builder)){
            throw new Exception("Builder is null");
        }
	}

	public function construitVoitureSansOption(){
        $this->checkBuilderNotNull();

		$this->builder->buildChassis("Acier");
		$this->builder->buildMoteur(new Moteur(143, 4, 1.9));
		$this->builder->buildCarrosserie(new Carrosserie("Acier + Composite"));
		$this->builder->buildSiege("Tissu", 5);
		return $this->builder->getResult();
	}

	public function construitVoitureSport(){
        $this->checkBuilderNotNull();

		$this->builder->buildChassis("Acier");
		$this->builder->buildMoteur(new Moteur(186, 4, 2.2));
		$this->builder->buildCarrosserie(new Carrosserie("Acier + Composite"));
		$this->builder->buildSiege("Cuir", 4);
		$this->builder->buildSpoiler("Aluminium");
		return $this->builder->getResult();
	}

}


$atelier = new Atelier();

$atelier->setBuilder(new SuvBuilder());
$voitureClassique = $atelier->construitVoitureSansOption();
$voitureClassique->showFicheTechnique();

$atelier->setBuilder(new ManuelUtilisateurBuilder());
$manuel = $atelier->construitVoitureSansOption();
$manuel->showCarnetEntretien();


$atelier->setBuilder(new SuvBuilder());
$voitureSport = $atelier->construitVoitureSport();
$voitureSport->showFicheTechnique();

$atelier->setBuilder(new ManuelUtilisateurBuilder());
$manuelSport = $atelier->construitVoitureSport();
$manuelSport->showCarnetEntretien();

?>