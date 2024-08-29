<?php
require_once "gps.php";
$gpas1 = new gpas();
$datas = $gpas1->tampilData();
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
            <th>id student</th>
            <th>cumulative gpa</th>
        </tr>
        <?php  foreach($datas as $data) :?>
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