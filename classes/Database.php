<?php

class Database {

  var $host = "localhost";
  var $dbname = "rpm";
  var $username = "root";
  var $pass = "pass";
  var $db;


  private function __construct(){
    try {
      $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username,$this->pass);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }

  public function fetch($query){
    $results = $this->db->query($query);
    return $results->fetchAll();
  }

  public static function getInstance(){
    static $instance;
    if($instance == null){
    $instance = new Database();
    }
    return $instance;
  }

}






 ?>
