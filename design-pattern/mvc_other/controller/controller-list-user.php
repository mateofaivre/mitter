<?php
require ("modele/modele-list-user.php");
   
class ListUser{

    public function __construct(){
        $modele = new ModeleListUser();
        $data = $modele->getAllUser();
        
        require("vue/vue-list-user.php"); 
    }

}
?>