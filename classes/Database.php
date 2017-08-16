<?php

class Database {

  var $host = "localhost";
  var $dbname = "rpm";
  var $username = "root";
  var $pass = "pass";
  var $conn;

  private function __construct(){
    //For injection handeling
   $this->conn = mysqli_connect($this->host, $this->username, $this->pass, $this->dbname);
   if(!$this->conn){
     echo 'Error Connecting';
   } else {
//     echo 'Procedural Connected';
   }
  }

  public function fetch($query){
    if(!$this->conn){
      echo 'Fetch Error';
      return false;
    }
    $result = mysqli_query($this->conn, $query);
    $retVal = array();
    while($row = mysqli_fetch_assoc($result)){
      array_push($retVal, $row);
    }
    return $retVal;
  }

  public function query($query){
    if(!$this->conn){
      echo 'Fetch Error';
      return false;
    }
    $result = mysqli_query($this->conn, $query);
    if(!$result){
      return false;
    } else {
      return true;
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
    if(!$this->conn){
      return false;
    } else {
      return $this->conn->insert_id;
    }
  }


}






 ?>
