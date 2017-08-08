<?php

class Database {

  var $host = "localhost";
  var $dbname = "rpm";
  var $username = "root";
  var $pass = "pass";
  var $db;
  var $conn;




  private function __construct(){
    try {
      $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username,$this->pass);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    //For injection handeling
   $this->conn = mysqli_connect('localhost', 'root', 'pass');
   if($this->conn === null){
     echo 'Error Connecting';
   }
  }

  public function fetch($query){
    if($this->db != null){
      $results = $this->db->query($query);
      return $results->fetchAll();
    } else {
      echo "Connection Error";
    }
  }

  public function query($query){
    if($this->db != null){
      return $this->db->query($query);
    } else {
      echo "Connection Error";
    }
  }

  public static function getInstance(){
    static $instance;
    if($instance == null){
    $instance = new Database();
    }
    return $instance;
  }

  public function lastId(){
    return $this->db->lastInsertId();
  }

}






 ?>
