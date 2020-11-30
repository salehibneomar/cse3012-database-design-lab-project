<?php 
require "../config/systeminit.php";

$floor=$unit=$tenant=$staff=$complain=$rent="";

    if($panel_sys==="1"){
        $result=QUERY_AND_FETCH($conn,"SELECT COUNT(DISTINCT(floor_no)) AS FC FROM unit WHERE house_id='$hid'");
        $floor=$result['FC'];
        $result=QUERY_AND_FETCH($conn,"SELECT COUNT(unit_no) AS UC FROM unit WHERE house_id='$hid'");
        $unit=$result['UC'];
        $result=QUERY_AND_FETCH($conn,"SELECT COUNT(tid) AS TC FROM tenant WHERE hid='$hid'");
        $tenant=$result['TC'];
        $result=QUERY_AND_FETCH($conn,"SELECT COUNT(sid) AS SC FROM staff WHERE hid='$hid'");
        $staff=$result['SC'];
        $result=QUERY_AND_FETCH($conn,"SELECT COUNT(cid) AS CC FROM complain WHERE hid='$hid'");
        $complain=$result['CC'];
        $result=QUERY_AND_FETCH($conn,"SELECT SUM(amount) AS RC FROM rent WHERE hid='$hid'");
        $rent=$result['RC'];
        $result=QUERY_AND_FETCH($conn,"SELECT name FROM owner WHERE oid='$user_id'");
        $_SESSION['USER']=$result['name'];
    }
    else if($panel_sys==="2"){
        $result=QUERY_AND_FETCH($conn,"SELECT u.floor_no FROM unit u, tenant t WHERE house_id='$hid' AND tid='$user_id' AND t.unit_no=u.unit_no");
        $floor=$result['floor_no'];
        $result=QUERY_AND_FETCH($conn,"SELECT unit_no FROM tenant WHERE hid='$hid' AND tid='$user_id'");
        $unit=$result['unit_no'];
        $result=QUERY_AND_FETCH($conn,"SELECT COUNT(tid) AS TC FROM tenant WHERE hid='$hid'");
        $tenant=$result['TC'];
        $result=QUERY_AND_FETCH($conn,"SELECT COUNT(sid) AS SC FROM staff WHERE hid='$hid'");
        $staff=$result['SC'];
        $result=QUERY_AND_FETCH($conn,"SELECT COUNT(cid) AS CC FROM complain WHERE hid='$hid' AND tid='$user_id'");
        $complain=$result['CC'];
        $result=QUERY_AND_FETCH($conn,"SELECT SUM(amount) AS RC FROM rent WHERE hid='$hid' AND tid='$user_id'");
        $rent=$result['RC'];
        $result=QUERY_AND_FETCH($conn,"SELECT name FROM tenant WHERE tid='$user_id'");
        $_SESSION['USER']=$result['name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>

<?php include "../includes/nav.php" ?>

<?php include "../includes/dashboardcards.php" ?>
        

<!-- ========== Scripts ========== -->
<?php include "../includes/cdnscripts.php" ?>

    </body>
</html>
<!-- ========== Developer ==========
Name: Saleh Ibne Omar.
Date created: 3 June 2019.
Last updated:
-->