# TUGAS 2 PWEB2-OOP
Buatlah database yang akan menghubungkan host, user, pass, dan database. Lalu  jika sudah nenambahkan ke database phpmyadmin lalu tambahkan database sesuai soal yang diberi, selanjutnya membuat relasi antar kolom satu dengan kolom lainnya.
<gambar relasi>

jika sudah lanjut membuat koneksi.php
## koneksi.php
langkah pertama membuat koneksi yang dimana koneksi ini akan menghubungkan ke data base 

```php
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

```
Jika sudah melalukan koneksi.php lalu lanjut dengan membuat class lainnya di file yang berbeda. Di file ini Saya menamakannya gps.php

## gps.php
Didalam file ini menggunakan turunan dan difile ini juga akan menampilkan data setiap tabel yang ada di database.
```php
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
```
# gpas.php

Di dalam file ini menampilkan tabel yang ada di database tetapi hanya menampilkan yang ada di gpas saja.

```php
<?php
// memanggil gps.phhp
require_once "gps.php";
// objek baru gpas1 akan mengases properti yang ada diclass gpas
$gpas1 = new gpas();
// variable bru ini akan menampilkan tampilkanData()
$datas = $gpas1->tampilData();
// variabel $i dengan nilai 1 variabel ini digunakan untuk menampilkan nomor urut di tabel HTML
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugaspweb2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    // memanggil navbar.php
    require_once "navbar.php"
    ?>
    <table class="table table-success table-striped">
        <tr>
            <th>No</th>
            <th>id student</th>
            <th>cumulative gpa</th>
        </tr>
        <!-- mengiterasi setiap elemen dalam array -->
        <?php  foreach($datas as $data) :?>
            <tr>
                <!-- menampilkan nomor dari urutan 1 -->
                <td><?= $i++?></td>
                <!-- menampilkan id_student -->
                <td><?= $data['id_student']?></td>
                <!-- menampilkan comulative_gpa -->
                <td><?= $data['cumulative_gpa']?></td>
            </tr>
            <!-- mengakhiri loop/perulangan forech -->
        <?php endforeach ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## output
```bash
No	id student	cumulative gpa
1	    1	         3.00
2	    1	         1.00
3	    2	         4.00
4	    3	         2.00
5	    4	         1.00
```
## gpas1.php
hanya menampilkan/ menyaring id_student yang berangka 1.

```php
<?php
// memanggil gps.php
require_once "gps.php";
// didalam gps1 akan mengakses baru di class gpas1
$gpas1 = new gpas1();
// var data1 akan menghubungkan ke gpas1 yang dimana di gpas1 ada metode tampilData()
$datas1 = $gpas1->tampilData();
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugaspweb2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
// memanggil navbar.php
    require_once "navbar.php"
    ?>
<table class="table table-success table-striped"
        <tr>
            <th>No</th>
            <th>id student</th>
            <th>cumulative gpa</th>
        </tr>
        <!-- mengiterasi setiap elemen dalam array -->
        <?php  foreach($datas1 as $data) :?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $data['id_student']?></td>
                <td><?= $data['cumulative_gpa']?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## output
```bash
No	id student	cumulative gpa
1	    1	         3.00
2	    1	         1.00
```

# gpa_details.php

Di dalam file ini menampilkan tabel yang ada di database tetapi hanya menampilkan yang ada di gpa_details saja.

```php
<?php
// memanggil gps.phhp
require_once "gps.php";
// objek baru gpas1 akan mengases properti yang ada diclass gpa_details
$gpa_details = new gpa_details();
// variable bru ini akan menampilkan tampilkanData()
$datas = $gpa_details->tampilData();
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugaspweb2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    require_once "navbar.php"
    ?>
    <table class="table table-success table-striped">
        <tr>
            <th>No</th>
            <th>id gpa</th>
            <th>semester</th>
            <th>semester_gpa</th>
        </tr>
        <?php  foreach($datas as $data) :?>
            <tr>
                <td><?= $i++?></td>
                <!-- menampilkan id_gpa -->
                <td><?= $data['id_gpa']?></td>
                <!-- menampilkan semester -->
                <td><?= $data['semester']?></td>
                <!-- menampilkan semester_gpa -->
                <td><?= $data['semester_gpa']?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

## output

```bash
No	id gpa	semester	semester_gpa
1	  1	       1	      1.00
2	  2	       2	      2.00
3	  4	       3	      4.00
4	  4	       3	      3.00
```
#  gpa_details1.php

hanya menampilkan/ menyaring semester yang berangka 1.

```php
<?php
require_once "gps.php";
$gpa_details1 = new gpa_details1();
$datas1 = $gpa_details1->tampilData();
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugaspweb2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    require_once "navbar.php"
    ?>
    <table class="table table-success table-striped">
        <tr>
            <th>No</th>
            <th>id gpa</th>
            <th>semester</th>
            <th>semester_gpa</th>
        </tr>
        <?php  foreach($datas1 as $data) :?>
            <tr>
                <td><?= $i++?></td>
                <!-- menampilkan id_gpa -->
                <td><?= $data['id_gpa']?></td>
                <!-- menampilkan semester -->
                <td><?= $data['semester']?></td>
                <!-- menampilkan semester_gpa -->
                <td><?= $data['semester_gpa']?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## output

```bash
No	id gpa	semester	semester_gpa
1	  1	       1	   
1.00
```
#  report.php
Di dalam file ini menampilkan tabel yang ada di database tetapi hanya menampilkan yang ada di report saja.

```php
<?php
// memanggil gps.php
require_once "gps.php";
// objek baru gpas1 akan mengases properti yang ada diclass gpa_details
$report = new reports();
// variable bru ini akan menampilkan tampilkanData()
$datas = $report->tampilData();
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugaspweb2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    require_once "navbar.php"
    ?>
    <table class="table table-success table-striped">
        <tr>
            <th>NO</th>
            <th>GPAS</th>            
            <th>report date</th>           
            <th>status</th>    
            <th>has acc academic advisor</th>   
            <th>has acc head of program</th>   

        </tr>
        <?php  foreach($datas as $data) :?>
            <tr>
                <td><?= $i++?></td>
                <!-- menampilkan id_gpas -->
                <td><?= $data['id_gpas']?></td>
                <!-- menampilkan report_date -->
                <td><?= $data['report_date']?></td>
                <!-- menampilkan status -->
                <td><?= $data['status']?></td>
                <!-- menampilkan has_acc_academic_advisor -->
                <td><?= $data['has_acc_academic_advisor']?></td>
                <!-- menampilkan has_acc_head_of_program -->
                <td><?= $data['has_acc_head_of_program']?></td>
                

            </tr>
        <?php endforeach ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## output

```bash

NO	GPAS	report date	status	has acc academic advisor	has acc head of program
1	  1	    2024-08-01	 Pending	     1	             0
2	  2	    2024-08-08	 Pending	     1	             0
3	  3	    2024-08-09	 Approved	     1	         0
```
#  report1.php
hanya menampilkan/ menyaring status yang panding.

```php
<?php
// memanggil gps.php
require_once "gps.php";
$report1 = new reports();
// objek baru gpas1 akan mengases properti yang ada diclass gpa_details
$datas1 = $report1->tampilData();
// variable bru ini akan menampilkan tampilkanData()
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugaspweb2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    require_once "navbar.php"
    ?>
    <table class="table table-success table-striped">
        <tr>
            <th>NO</th>
            <th>GPAS</th>            
            <th>report date</th>           
            <th>status</th>    
            <th>has acc academic advisor</th>   
            <th>has acc head of program</th>   

        </tr>
        <?php  foreach($datas1 as $data) :?>
            <tr>
                <td><?= $i++?></td>
                <!-- menampilkan id_gpas -->
                <td><?= $data['id_gpas']?></td>
                <!-- menampilkan report_date -->
                <td><?= $data['report_date']?></td>
                <!-- menampilkan status -->
                <td><?= $data['status']?></td>
                <!-- menampilkan has_acc_academic_advisor -->
                <td><?= $data['has_acc_academic_advisor']?></td>
                <!-- menampilkan has_acc_head_of_program -->
                <td><?= $data['has_acc_head_of_program']?></td>
                

            </tr>
        <?php endforeach ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
## output

```bash

NO	GPAS	report date	status	has acc academic advisor	has acc head of program
1	  1	    2024-08-01	 Pending	     1	             0
2	  2	    2024-08-08	 Pending	     1	             0
3	  3	    2024-08-09	 Approved	     1	         0
```
# Navbar
bagian dari antarmuka pengguna pada sebuah situs web yang biasanya terletak di bagian atas halaman. 

```php
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <!-- memanggil gpas.php -->
        <a class="nav-link active" aria-current="page" href="gpas.php">GPAS</a>
        <!-- memanggil gpas1.php -->
        <a class="nav-link" href="gpas1.php">GPAS1</a>
        <!-- memanggil gpa_details.php -->
        <a class="nav-link" href="gpa_details.php">GPA DETAILS</a>
        <!-- memanggil gpa_details1.php -->
        <a class="nav-link" href="gpa_details1.php">GPA DETAILS1 </a>
        <!-- memanggil report.php -->
        <a class="nav-link" href="report.php">REPORT </a>
        <!-- memanggil report.php -->
        <a class="nav-link" href="report1.php">REPORT1 </a>
      </div>
    </div>
  </div>
</nav>
```
## output
```bash
GPAS     GPAS1     GPA DETAILS     GPA DETAILS1     REPORT     REPORT1
```
