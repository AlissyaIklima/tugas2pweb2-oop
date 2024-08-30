<?php
// memanggil koneksi.php
require './koneksi.php';
// class gpas mewarisi class database
class gpas extends Database{
    public function __construct(){
        // didalam perent akan memanggil construct yang didalamnya terdapat class database
        parent::__construct();
    }
    // dimana metode tampilData() digunakan untuk mengambil semua data yang ada di tabel gpas
    public function tampilData(){
        // membuat varible baru yang berisi select yang akan memanngil yang ada di tabel gpas
        $sql = "select * from gpas ";
        // akan memanggil kmbali inisialisasi dari coonection yang berisi tabel query yang menampilkan
        // yang ada di variable $sql
        return $this->conn->query($sql);
    }
}
// class gpa_details mewarisi class database
class gpa_details extends Database{
    public function __construct(){
        // didalam perent akan memanggil construct yang didalamnya terdapat class database
        parent::__construct();
    }
    // dimana metode tampilData() digunakan untuk mengambil semua data yang ada di tabel gpa_details
    public function tampilData(){
        // membuat varible baru yang berisi select yang akan memanngil yang ada di tabel gpa_details
        $sql = "select * from gpa_details ";
        // yang ada di variable $sql
        return $this->conn->query($sql);
    }
}
// class reports mewarisi class database
class reports extends Database{
    public function __construct(){
         // didalam perent akan memanggil construct yang didalamnya terdapat class database
        parent::__construct();
    }
        // dimana metode tampilData() digunakan untuk mengambil semua data yang ada di tabel report
    public function tampilData(){
        // membuat varible baru yang berisi select yang akan memanngil yang ada di tabel report
        $sql = "select * from reports ";
        // yang ada di variable $sql
        return $this->conn->query($sql);
    }
}
// class gpas1 merupaan pewarisan dari class gpas
class gpas1 extends gpas{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        // variabli ini hanya menampilkan/ menyaring id_student yang berangka 1
        $sql = "select * from gpas where id_student = 1 ";
        return $this->conn->query($sql);
    }
}
// class gpa_details1 merupaan pewarisan dari class gpa_details
class gpa_details1 extends gpa_details{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        // variabli ini hanya menampilkan/ menyaring semester yang berangka 1
        $sql = "select * from gpa_details where semester = 1 ";
        return $this->conn->query($sql);
    }
}
class report1 extends reports{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        // variabli ini hanya menampilkan/ menyaring status yang pending
        $sql = "select * from report where status = 'Pending' ";
        return $this->conn->query($sql);
    }
}
?>