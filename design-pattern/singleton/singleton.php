<?php

class Singleton {

    //instance privé et statique de la classe
    private static $_instance = null;

    //constructeur privé de la classe 
    private function __construct() {  
    }

    //fonction de clone privé 
    private function __clone() {  
    }

    //Méthode statique qui crée l'unique instance de la classe
    public static function getInstance() {
        if( is_null(self::$_instance) ) {
            self::$_instance = new Singleton();  
        }
        return self::$_instance;
    }

}
?>
