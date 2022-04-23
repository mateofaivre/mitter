<?php 
require_once 'database-connect.php';

class ModeleListUser{

    private $_dbh;

    public function __construct(){
        $this->_dbh = DbConnect::getInstance();
    }

    public function getAllUser(){
        $sql = 'SELECT * from client';

        $sth = $this->_dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }

}

?>