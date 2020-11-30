<?php 
require "../config/systeminit.php";
if($panel_sys==="1"){
    $query=QUERY($conn,"SELECT DISTINCT(title), SUM(amount) AS Total FROM expense 
    WHERE hid='$hid' AND oid='$user_id' GROUP BY title ORDER BY SUM(amount)");
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
    <title>Expenses</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">
</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Expenses</h5>
                <div class="ov-handler">
                <table class="table table-bordered table-type-1">
                    <tr>
                        <th>Title</th>
                        <th>Total Cost</th>
                    </tr>
                    <?php while($result=RESULT($query)){ ?>
                        <tr>
                            <td><?=$result['title'];?></td>
                            <td><?=$result['Total'];?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" style="text-align:center !important;">
                            <a href="expensedetails.php" class="btn btn-info">Click here for full list</a>
                        </td>
                    </tr>
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