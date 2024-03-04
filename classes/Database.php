<?php 

class Database {
  private $server_name = "localhost";
  private $username = "root";
  private $password = "root"; //for MAMP users 'root' for password
  private $db_name = "sale_oop";
  protected $conn;

  public function __construct()
  {
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error){
          die('Error to connect to database:' . $this->conn->connect_error);
        }
  }

}
?>