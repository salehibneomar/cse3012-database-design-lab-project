<?php 
require "../config/systeminit.php";
if(isset($_GET['sid']) && $panel_sys==="1" && !(empty($_GET['sid']))){
    $sid=$_GET['sid'];
    $result=QUERY_AND_FETCH($conn, "SELECT sid AS ID, name AS Name, designation AS Designation, 
    joining_date AS 'Joining Date', nid AS NID, phone AS Phone, gender AS Gender,dob AS 'Date of birth', 
    salary AS Salary, marital_status AS 'Marital Status', pre_workplace AS 'Previous Workplace', 
    present_address AS 'Present Address', permanent_address AS 'Permanent Address', status AS Status 
    FROM staff WHERE hid='$hid' AND oid='$user_id' AND sid='$sid'");
}
else{
    header("Location: stafflist.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Information</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Staff</h5>
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