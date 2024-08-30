<?php
// didalam class memiliki properti
// class dtabase memiliki fungsi menghubungkan ke database
class Database {
    //  private hanya bisa dijalankan oleh class itu sendiri dan class keturunannya
    // $host menyimpan alamat database
    // $user menyimpan si pengguna
    // $pass menyipan sandi pengguna
    // $db menyimpan database yang akan diakses
    private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db = "db_pweb2";
    // properti protected bisa diakses oleh turunan dari class database
	protected $conn;
    // metode __construct() otomatis akan berjalan ketika database dibuat
	public function __construct(){
        // menginisialisasikan 
            $this->host = 'localhost'; 
            $this->user = 'root';
            $this->pass = ''; 
            $this->db = 'db_pweb2';
            // connection database akan menampilkan eror atau tidaknya
            // dan biasanya dibuka dengan new mysqli()
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            // jika inisialisasi dari connection eror
            if ($this->conn->error) {
                // maka koneksi gagal
                die("Koneksi gagal: " . $this->conn->connect_error);
            }
    }
}
?>
