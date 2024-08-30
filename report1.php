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