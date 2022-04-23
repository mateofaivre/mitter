<?php

class DbConnect{

    private static $_dbh = null;

    private function __construct() {
    }

    private function __clone() {
    }

    public static function getInstance() {
        if( is_null(self::$_dbh) ) {
            try {
                self::$_dbh = new PDO('mysql:host=localhost:3308;dbname=demo', 'root', '');
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage() . "<br/>"; 
                die();
            }
        }
        return self::$_dbh;
    }

}
?>