<?php 
require "../config/systeminit.php";
if($panel_sys==="1"){
$query=QUERY($conn,"SELECT DISTINCT(floor_no), COUNT(unit_no) AS UC 
FROM unit WHERE house_id=$hid GROUP BY floor_no ORDER BY unit_no ASC");
}
else{
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Floor List</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        td{
            width: 33.33% !important;
        }
    </style>
</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Floor List</h5>
                <div class="ov-handler">
                <table class="table table-bordered table-type-2 sortable-theme-minimal" data-sortable>
                    <thead>
                        <tr>
                            <th>Floor</th>
                            <th>Total Unit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($result=RESULT($query)){ ?>
                        <tr>
                            <td><?=$result['floor_no']?></td>
                            <td><?=$result['UC']?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="editfloor.php?floor=<?=$result['floor_no'];?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="deletefloor.php?floor=<?=$result['floor_no'];?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                   <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </section>

<!-- ========== Scripts ========== -->
<?php include "../includes/cdnscripts.php" ?>

    </body>
</html>
<!-- ========== Developer ==========
Name: Saleh Ibne Omar.
Date created: 3 June 2019.
Last updated:
-->