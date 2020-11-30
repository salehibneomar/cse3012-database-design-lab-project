<?php 
require "../config/systeminit.php";

$result1=QUERY_AND_FETCH($conn, "SELECT * FROM house WHERE hid='$hid'");
$result2=QUERY_AND_FETCH($conn, "SELECT COUNT(DISTINCT(floor_no)) AS FC FROM unit WHERE house_id='$hid'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>House Information</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
                <h5 class="table-card-title">House Information</h5>
                    <table class="table table-bordered table-type-1">
                        <tr>
                            <th>Title</th>
                            <th>Details</th>
                        </tr>
                    <?php if($panel_sys==="1"){
                        echo "<tr>
                            <td>House Id</td>
                            <td>{$result1['hid']}</td>
                        </tr>"; } ?>    

                        <tr>
                            <td>House Name</td>
                            <td><?=$result1['name'];?></td>
                        </tr>
                        <tr>
                            <td>House Location</td>
                            <td><?=$result1['location'];?></td>
                        </tr>
                        <tr>
                            <td>Floor Count</td>
                            <td><?=$result2['FC'];?></td>
                        </tr>
                        <tr>
                            <td>Dimension (L X W)</td>
                            <td><?=$result1['length']." X ".$result1['width'];?></td>
                        </tr>
                        <tr>
                            <td>Elevetor Count</td>
                            <td><?=$result1['elevetors'];?></td>
                        </tr>
                        <tr>
                            <td>CCTV Count</td>
                            <td><?=$result1['cctvs'];?></td>
                        </tr>
                        <?php 
                            if($panel_sys==="1"){
                        echo '<tr>
                            <td colspan="2" style="text-align:center;">
                            <a href="'."edithouseinfo.php?hid={$hid}".'" class="btn btn-info"><i class="fas fa-edit"></i>&ensp;Edit</a>
                            </td>
                        </tr>';
                            }
                        ?>

                    </table> 
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