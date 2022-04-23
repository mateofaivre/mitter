<?php 

interface Salarie{
    public function recoitSalaire($val);
}

class Employe implements Salarie {

    private $_nom;

    public function __construct($name) {  
        $this->_nom = $name;
    }

    public function recoitSalaire($val){
        echo "L'Employe " . $this->_nom . " à reçu un salaire de : " . $val;
    }

}

class Etudiant {

    private $_nom;
    private $_classe;

    public function __construct($name, $annee) {  
        $this->_nom = $name;
        $this->_classe = $annee;
    }

    public function getNom(){
        return $this->_nom;
    }

}

class EtudiantAdapter implements Salarie{

    private $_etudiant = null;

    public function __construct($etudiant) {  
        $this->_etudiant = $etudiant;
    }

    public function recoitSalaire($val){
        echo "L'Etudiant " . $this->_etudiant->getNom() . " à reçu un salaire de : " . $val;
    }
 
}

$personnes[0]= new Employe("Delaborde Noe");
$personnes[1]= new Employe("Jane Doe");
$personnes[2]= new EtudiantAdapter(new Etudiant("John Doe", 1));

foreach ($personnes as $personne){
    $personne->recoitSalaire(rand(1300, 1700));
}

?>
