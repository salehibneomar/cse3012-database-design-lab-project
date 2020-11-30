<?php 
require "../config/systeminit.php";

    if($panel_sys==="1"){
        $result=QUERY_AND_FETCH($conn,"SELECT oid AS ID, name AS Name, phone AS Phone, email AS Email,
                                       occupation AS Occupation, present_address AS 'Present Address',
                                       permanent_address AS 'Permanent Address'
                                       FROM owner WHERE oid='$user_id'");
    }
    else if($panel_sys==="2"){
        $result=QUERY_AND_FETCH($conn,"SELECT tid AS ID, name AS Name, phone AS Phone, email AS Email,
                                       occupation AS Occupation, previous_address AS 'Previous Address',
                                       permanent_address AS 'Permanent Address' 
                                       FROM tenant WHERE tid='$user_id' AND hid='$hid'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Profile</h5>
                <div class="card">
                    <div class="card-header">
                        <div class="profile-icon">
                            <img src="../img/propic.png" alt="">
                            <a href="" class="btn btn-sm btn-info p-edit-btn"><i class="fas fa-edit"></i>&ensp;Edit</a>
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