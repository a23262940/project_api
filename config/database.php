<?php
  class Databases{
    //資料庫的初始值
    private $host = 'localhost:3306';
    private $db_name = 'company';
    private $username = 'root';
    private $password = '123qwe';
    private $conn;
    public $var = 'a default value';
    //連接資料庫
    public function connect(){
      $this->conn=null;
      try {
        $this->conn = new PDO('mysql:host='. $this->host. ';dbname='. $this->db_name,
        $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo 'Connection Error:'. $e->getMessage();
      }
      return $this->conn;
    }
  }
 ?>
