<?php 
require "../config/systeminit.php";

$page=1;
$limit=10;
$totalRec="";
$totalrows=0;
    if($panel_sys==="1"){$totalrows=ROW_COUNT($conn,"SELECT cid FROM complain WHERE hid='$hid' AND oid='$user_id'");}
    else if($panel_sys==="2"){$totalrows=ROW_COUNT($conn,"SELECT cid FROM complain WHERE hid='$hid' AND tid='$user_id'");}
$req_pages=ceil($totalrows/$limit);

if(isset($_GET['page'])){
    $page=$_GET['page'];
}
$start=($page-1)*$limit;
    if($panel_sys==="1"){$query=QUERY($conn,"SELECT c.cid, c.problem, c.date, c.status, t.name, t.phone FROM complain c, tenant t 
                                    WHERE c.hid='$hid' AND c.oid='$user_id' AND t.tid=c.tid ORDER BY c.date DESC LIMIT $start,$limit");}
    else if($panel_sys==="2"){$query=QUERY($conn,"SELECT c.cid, c.problem, c.date, c.status, t.name, t.phone FROM complain c, tenant t 
                                    WHERE c.hid='$hid' AND c.tid='$user_id' AND t.tid='$user_id' AND c.tid=t.tid ORDER BY c.date DESC LIMIT $start,$limit");}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if($panel_sys==="2"){ echo 'My Complains'; }else{ echo 'Tenant Complains'; } ?></title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
    <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title"><?php if($panel_sys==="2"){ echo 'My Complains'; }else{ echo 'Tenant Complains'; } ?></h5>
                <div class="ov-handler">
                <table class="table table-bordered table-type-2 sortable-theme-minimal" data-sortable>
                       <thead>
                            <tr>
                                <th>Problem</th>
                                <th>Complainant</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Status</th>
                    <?php if($panel_sys==="1"){echo '<th>Action</th>'; } ?>
                            </tr>
                       </thead>
                       <tbody>
                    <?php while($result=RESULT($query)){?>
                            <tr>
                                <td><?=$result['problem'];?></td>
                                <td><?=$result['name'];?></td>
                                <td><?=$result['phone'];?></td>
                                <td><?=$result['date'];?></td>
                                <td><?php if($result['status']==1){echo'Solved';}else{echo'Not solved';}?></td>
                    <?php if($panel_sys==="1"){echo '<td>
                                    <a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>';} ?>
                            </tr>
                    <?php } ?> 
                       </tbody>
                </table>
                </div>
                <div class="pagination-div">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="tenantcomplains.php?page=<?=PRE($page)?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                </a>
                            </li>
                            <?php for($i=1; $i<=$req_pages; $i++){?>
                                <li class="page-item">
                                    <a class="page-link" href="tenantcomplains.php?page=<?=$i;?>"><?=$i;?></a>
                                </li>
                            <?php }?>
                            <li class="page-item">
                                <a class="page-link" href="tenantcomplains.php?page=<?=NXT($page,$req_pages)?>" aria-label="Next">
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

    </body>
</html>
<!-- ========== Developer ==========
Name: Saleh Ibne Omar.
Date created: 3 June 2019.
Last updated:
-->