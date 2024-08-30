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