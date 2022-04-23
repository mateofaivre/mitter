<?php 
interface DBInterface{
    public function connect();
    public function query($query);
}

class PostegreSQL implements DBInterface{
    private const DB_host = 'localhost';
    private const DB_user = 'username';
    private const DB_pwd = 'password';
    private const DB_name = 'db_name';

    private $conn;

    public function connect(){
        $this->conn = pg_connect("host=".self::DB_host." dbname=".self::DB_dbname." user=".self::DB_user." password=".self::DB_pwd);
    }

    public function query($query){
        if(!$this->conn){ 
            throw new Exception('Not connected to Postegre DB'); 
        }

        return pg_exec($this->conn, $query);
    }
}

class MySQL implements DBInterface{
    private const DB_host = 'localhost:3308';
    private const DB_user = 'root';
    private const DB_pwd = '';
    private const DB_name = 'demo';

    private $conn;

    public function connect(){
        $this->conn = new PDO("mysql:host=".self::DB_host.";dbname=".self::DB_name, self::DB_user, self::DB_pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public function query($query){
        if(!$this->conn){ 
            throw new Exception('Not connected to Mysql DB'); 
        }

        return $this->conn->query($query, PDO::FETCH_ASSOC);
    }
}


class DbFactory{
    public const POSTEGRE = 'postegreSQL';
    public const MYSQL = 'mysql';

    public static function create($type){
        if($type === self::POSTEGRE){
            return new PostegreSQL();
        }
        else if($type === self::MYSQL){
            return new MySQL();
        }
        return null;
    }
}


$db = DbFactory::create(DbFactory::MYSQL);
$db->connect();

$resQuery = $db->query("SELECT * FROM client;");
foreach ($resQuery as $row) {
    print_r($row)."<br>";
}

?>