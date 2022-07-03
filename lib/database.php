<?php
$currenturl = $_SERVER['PHP_SELF'];
$chkifthisfile = strpos($currenturl, "database.php");
if($chkifthisfile > 0){
    header("Location: ../login.php");
}
class database{
    private $servername = "localhost";
    private $dbname = "bounceback";
    private $username = "root";
    private $password = "";
    public $pdo;
    public function __construct(){
        if(!isset($pdo)){
            try{
                $link = new PDO("mysql:host=".$this->servername.";"."dbname=".$this->dbname,$this->username,$this->password);
                $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->pdo = $link;
            }catch(PDOException $e){
                die("Sorry, Something went wrong: " . $e->getMessage() );
            }
        }else{
            die("Failed to connect with the database.");
        }
    }
}

$db = new database();

?>