<?php
class Malumot{
    public $servername ;
    public $username  ;
    public $password ;
    public $db  ;
    public $charset = 'utf8mb4';
    
    public function __construct($servername,$username,$password, $db  ){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;


       $this -> connect();
    }

    
public function connect(){

    $dsn = "mysql:host=$this->servername;dbname=$this->db;charset=$this->charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    ];
    
    try {
       
        $conn = new PDO($dsn, $this->username, $this->password,$options);
        return $conn;

      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
       
}

}



