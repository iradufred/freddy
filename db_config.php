<?php
class db_config{
    private $host = 'localhost';
    private $dbname = 'myapp';
    private $user = 'root';
    private $password = '';
    public $db;
    public function __construct(){
        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            return $this->db;
        } catch (PDOException $e) {
            // Handle connection error
            // You can log the error message or display it based on your needs
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
}

?>
