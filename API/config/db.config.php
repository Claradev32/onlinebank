<?php
class Connection {

    protected string $servername = "localhost";
    protected string $username = "example_user";
    protected string $password = "password";
    protected string $dbname = "bankApp";
    public string $error = "";
    public $conn = "";
        
   
   function __construct(){
      // Create connection
      $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
      // Check connection
      if ($conn->connect_error) {
          $this->$error = $conn->connect_error;
      }
      $this->conn = $conn;
    }
}
?>