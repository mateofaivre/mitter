<?php
class Voiture implements \SplSubject {

    private $marque, $modele, $panne, $consomation, $capaciteReservoir, $quantiteCarburant;
    private $observers;

    public function __construct($marque, $modele, $capaciteReservoir, $consomation=(6.5/100)){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->capaciteReservoir = $capaciteReservoir;
        $this->quantiteCarburant = $capaciteReservoir;
        $this->consomation = $consomation;
        $this->panne = false;

        $this->observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer){
        echo "<span style='color:green'>Ajout d'un écouteur pour la voiture : $this->marque $this->modele.</span><br>";
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer){
        echo "<span style='color:purple'>Suppression d'un écouteur pour la voiture : $this->marque $this->modele.</span><br>";
        $this->observers->detach($observer);
    }

    public function notify(){
        if(count($this->observers)>0){
            foreach ($this->observers as $observer) {
                $observer->update($this);
            }
        }
    }

    public function setPanne(Bool $val){
        //Notifie et change la valeur uniquement si la donné a changé
        if($this->panne != $val){
            $this->panne = $val;
            $this->notify();
        }
    }

    private function updateQuantiteCarburant($quantite){
        $alertCarburantBeforeUpdate = $this->niveauCarburantFaible();

        $this->quantiteCarburant += $quantite;

        //Limite la quantite de carbutant à 0 au minimum
        if($this->quantiteCarburant < 0){
            $this->quantiteCarburant = 0;
            $this->setPanne(true);
        } else{
            $this->setPanne(false);
        }

        //Limite la quantite de carburant à la capacité du réservoir au maximum
        if($this->quantiteCarburant > $this->capaciteReservoir){
            $this->quantiteCarburant = $this->capaciteReservoir;
        } 
        
        //Si après la mise à jour du niveau de carburant, l'état faible de carburant a changé, alors on informe les écouteurs
        if($alertCarburantBeforeUpdate != $this->niveauCarburantFaible()){
            $this->notify();
        }
    }

    public function roule($km){
        $consoTotal = 0;
        for($kmRoule=0; $kmRoule<$km; $kmRoule++){
            if($this->estEnPanne()){
                break;
            }

            //On vérifie que la conso total ne dépasse pas ce qu'il reste dans le réservoir
            $consoTotal += ($this->consomation>$this->quantiteCarburant) ? $this->quantiteCarburant :  $this->consomation;

            $this->updateQuantiteCarburant(-$this->consomation);
        }
        echo "$this->marque $this->modele a roulé $kmRoule km et consommé $consoTotal L, reste $this->quantiteCarburant L.<br><br>";
    }

    public function rempliReservoir($quantite){
        //Pour remplir le réservoir, on accepte uniquement une quantité positive
        if($quantite<=0)
            return;
        $this->updateQuantiteCarburant($quantite);
    }

    public function niveauCarburantFaible(){
        //Si on est à moins de 10% de carburant alors le niveau est faible
        if($this->quantiteCarburant <= $this->capaciteReservoir*0.1)
            return true;
        return false;
    }

    public function estEnPanne(){
        return $this->panne;
    }

    public function getMarque(){ 
        return $this->marque; 
    }

    public function getModele(){ 
        return $this->modele; 
    }

}


class TableauBordVoiture implements \SplObserver{
    public function update(\SplSubject $subject){
        if ($subject instanceof Voiture) {
            if($subject->niveauCarburantFaible()){
                echo "<span style='color:orange;'>Voyant carburant faible allumé pour ".$subject->getMarque()." ".$subject->getModele().".</span><br>";
            } 
            if($subject->estEnPanne()){
                echo "<span style='color:red;'>Appel la dépaneuse pour : ".$subject->getMarque()." ".$subject->getModele().".</span><br>";
            }
        }
    }
}

class GestionnaireParcAutomobile implements \SplObserver{

    private $nomEntreprise;

    public function __construct($nomEntreprise){
        $this->nomEntreprise = $nomEntreprise;
    }

    public function getNomEntreprise(){
        return $this->nomEntreprise;
    }

    public function update(\SplSubject $subject){
        if ($subject instanceof Voiture) {
            if($subject->estEnPanne()){
                echo "<span style='color:red;'>Appel un garage pour récupérer la voiture : ".$subject->getMarque()." ".$subject->getModele().".</span><br>";
            }
        }
    }
}


$audiA3 = new Voiture("Audi", "A3", 50);
$peugeot208 = new Voiture("Peugeot", "208", 40);
$opelAdam = new Voiture("Opel", "Adam", 30);

$o1 = new TableauBordVoiture();
$o2 = new GestionnaireParcAutomobile("Parc de test");

$audiA3->attach($o1);
$audiA3->attach($o2);
$peugeot208->attach($o1);
$opelAdam->attach($o1);
echo "<br>";

$audiA3->roule(900);
$peugeot208->roule(200);
$opelAdam->roule(440);

$opelAdam->detach($o1);
$opelAdam->roule(35);

?>