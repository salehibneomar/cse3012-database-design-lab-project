<?php 
require "../config/systeminit.php";
    $result=QUERY_AND_FETCH($conn,"SELECT name AS Name, phone AS Phone, email AS Email, occupation AS Occupation, 
                                   present_address AS 'Present Address', permanent_address AS 'Permanent Address'
                                   FROM owner WHERE oid=(SELECT oid FROM house WHERE hid='$hid')");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner Information</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Owner</h5>
                <div class="card">
                    <div class="card-header">
                        <div class="profile-icon">
                            <img src="../img/propic.png" alt="">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="ov-handler">
                        <table class="table table-bordered table-type-1">
                            <tr>
                                <th>Title</th>
                                <th>Details</th>
                            </tr>
                            <?php foreach ($result as $col => $val){ ?>
                            <tr>
                                <td><?=$col;?></td>
                                <td><?=$val;?></td>
                            </tr>
                            <?php } ?>
                        </table>
                        </div>
                    </div>
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