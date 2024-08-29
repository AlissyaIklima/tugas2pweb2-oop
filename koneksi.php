<?php
// class blueprint dari objek
// didalam class memiliki objek 
class Database {
    //  
    private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db = "db_pweb2";
	protected $conn;
	public function __construct(){
            $this->host = 'localhost'; 
            $this->user = 'root';
            $this->pass = ''; 
            $this->db = 'db_pweb2';

            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if ($this->conn->error) {
                die("Koneksi gagal: " . $this->conn->connect_error);
            }
    }
}
?>
