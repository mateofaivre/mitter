<?php
//Ce fichier fait office de controlleur

//Utilisation du modèle pour récupérer les données
require ("modele/modele-list-user.php");
$modele = new ModeleListUser();
$data = $modele->getAllUser();

//Affichage de la vue qui exploite les données du mdodèle
require("vue/vue-list-user.php"); 
?>