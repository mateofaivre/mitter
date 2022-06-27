<?php
class ConnectDb {
    private static $instance = null;
    private $conn;
    
    private const DB_HOST = 'localhost';
    private const DB_USER = 'username';
    private const DB_PWD = 'password';
    private const DB_NAME = 'db_name';
    
    private function __construct() {
        $this->conn = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new ConnectDb();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->conn;
    }
}

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
?>