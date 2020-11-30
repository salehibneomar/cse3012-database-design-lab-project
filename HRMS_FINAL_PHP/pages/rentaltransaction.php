<?php 
require "../config/systeminit.php";

$page=1;
$limit=10;
$totalRec="";
$totalrows=0;
    if($panel_sys==="1"){$totalrows=ROW_COUNT($conn,"SELECT TxID FROM rent WHERE hid='$hid'");}
    else if($panel_sys==="2"){$totalrows=ROW_COUNT($conn,"SELECT TxID FROM rent WHERE hid='$hid' AND tid='$user_id'");}
$req_pages=ceil($totalrows/$limit);

if(isset($_GET['page'])){
    $page=$_GET['page'];
}

$start=($page-1)*$limit;

    if($panel_sys==="1"){$query=QUERY($conn,"SELECT r.TxID, r.amount, r.date, r.received_by, t.name, t.phone, t.unit_no FROM rent r, tenant t 
        WHERE r.hid='$hid' AND t.hid='$hid' AND r.tid=t.tid ORDER BY r.date DESC LIMIT $start,$limit");}
    else if($panel_sys==="2"){
        $query=QUERY($conn,"SELECT r.TxID, r.amount, r.date, r.received_by, t.name, t.phone, t.unit_no FROM rent r, tenant t 
        WHERE r.hid='$hid' AND t.hid='$hid' AND r.tid='$user_id' AND t.tid='$user_id' ORDER BY r.date DESC LIMIT $start,$limit");}    

    if(isset($_GET['ptid']) && $panel_sys==="1" && !(empty($_GET['ptid']))){
        $ptid=$_GET['ptid'];
        $query=QUERY($conn,"SELECT r.TxID, r.amount, r.date, r.received_by, t.name, t.phone, t.unit_no FROM rent r, tenant t 
        WHERE r.hid='$hid' AND t.hid='$hid' AND r.tid='$ptid' AND t.tid='$ptid' ORDER BY r.date DESC");
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if($panel_sys==="3"){ echo 'My Transactions'; }else{ echo 'Rental Transactions'; } ?></title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title"><?php if($panel_sys==="3"){ echo 'My Transactions'; }else{ echo 'Rental Transactions'; } ?> </h5>
                <div class="ov-handler">
                <table class="table table-bordered table-type-2 sortable-theme-minimal" data-sortable>
                    <thead>
                        <tr>
                            <th>TxID</th>
                            <th>Tenant Name</th>
                            <th>Unit</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Received By</th>
                            <th>Date</th>
                            <?php if($panel_sys==="1"){ echo '<th>Action</th>'; } ?>
                            
                        </tr>
                    </thead>
                        <tbody>
                        <?php while($result=RESULT($query)){?>
                            <tr>
                                <td><?=$result['TxID'];?></td>
                                <td><?=$result['name'];?></td>
                                <td><?=$result['unit_no'];?></td>
                                <td><?=$result['phone'];?></td>
                                <td><?=round($result['amount'],1);?></td>
                                <td><?=$result['received_by'];?></td>
                                <td><?=$result['date'];?></td>
                                <?php if($panel_sys==="1"){ echo '<td><a href="" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a></td>'; } ?>

                            </tr>
                        <?php } ?> 
                    </tbody>
                </table>
                </div>
                <div class="pagination-div" id="pgn">
                <nav>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="rentaltransaction.php?page=<?=PRE($page)?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                            </a>
                        </li>
                        <?php for($i=1; $i<=$req_pages; $i++){?>
                            <li class="page-item">
                                <a class="page-link" href="rentaltransaction.php?page=<?=$i;?>"><?=$i;?></a>
                            </li>
                        <?php }?>
                        <li class="page-item">
                                <a class="page-link" href="rentaltransaction.php?page=<?=NXT($page,$req_pages)?>" aria-label="Next">
                                    <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                </a>
                        </li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </section>

<!-- ========== Scripts ========== -->
<?php include "../includes/cdnscripts.php" ?>
    <script>
        var ptid="<?=$ptid;?>";
        if(ptid.trim()!=""){
            document.getElementById('pgn').style.display="none";
        }
    </script>
    </body>
</html>
<!-- ========== Developer ==========
Name: Saleh Ibne Omar.
Date created: 3 June 2019.
Last updated:
-->