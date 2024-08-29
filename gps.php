<?php
// memanggil koneksi.php
require './koneksi.php';
class gpas extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        $sql = "select * from gpas ";
        return $this->conn->query($sql);
    }
}
class gpa_details extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        $sql = "select * from gpa_details ";
        return $this->conn->query($sql);
    }
}
class reports extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        $sql = "select * from reports ";
        return $this->conn->query($sql);
    }
}
class gpas1 extends gpas{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        $sql = "select * from gpas where id_student = 1 ";
        return $this->conn->query($sql);
    }
}
class gpa_details1 extends gpa_details{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        $sql = "select * from gpa_details where semester = 1 ";
        return $this->conn->query($sql);
    }
}
class report1 extends reports{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        $sql = "select * from report where status = 'Pending' ";
        return $this->conn->query($sql);
    }
}
?>