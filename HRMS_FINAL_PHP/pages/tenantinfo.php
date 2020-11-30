<?php 
require "../config/systeminit.php";
if(isset($_GET['tid']) && $panel_sys==="1" && !(empty($_GET['tid']))){
    $tid=$_GET['tid'];
    $result=QUERY_AND_FETCH($conn, "SELECT tid AS ID, name AS Name, occupation AS Occupation, 
    rental_date AS 'Rental Date', unit_no AS Unit, nid AS NID, phone AS Phone, 
    email AS Email, previous_address AS 'Previous Address', permanent_address AS 'Permanent Address', 
    family_members AS 'Family member count', monthly_rent AS Rent, 
    gas_bill AS 'Gas Bill', water_bill AS 'Water Bill', status AS Status 
    FROM tenant WHERE hid='$hid' AND tid='$tid'");
}
else{
    header("Location: tenantlist.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tenant Information</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Tenant</h5>
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
                                    <td><?php if($col=="Status" && $val==1){echo "Active";}
                                            else if($col=="Status" && $val==0){echo "In-Active";} 
                                            else if($col=="Email" && empty($val)){echo "N/A";} 
                                            else{echo $val;} ?>
                                    </td>
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