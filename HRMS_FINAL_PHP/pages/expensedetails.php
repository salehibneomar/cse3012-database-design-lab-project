<?php 
require "../config/systeminit.php";
if($panel_sys==="1"){
    $page=1;
    $limit=10;
    $totalrows=ROW_COUNT($conn,"SELECT TxID FROM expense WHERE hid='$hid' AND oid='$user_id'");
    $req_pages=ceil($totalrows/$limit);
    
    if(isset($_GET['page']) && !(empty($_GET['page']))){
        $page=$_GET['page'];
    }
    
    $start=($page-1)*$limit;
    $query=QUERY($conn,"SELECT TxID, title, date, amount, paid_by, sid FROM expense
                WHERE hid='$hid' AND oid='$user_id' ORDER BY date DESC LIMIT $start,$limit");
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
    <title>Expense Details</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Expense Details</h5>
                <div class="ov-handler">
                <table class="table table-bordered table-type-2 sortable-theme-minimal" data-sortable>
                    <thead>
                        <tr>
                            <th>TxID</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>SID</th>
                            <th>Date</th>
                            <th>Paid By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($result=RESULT($query)){ ?>
                        <tr>
                            <td><?=$result['TxID'];?></td>
                            <td><?=$result['title'];?></td>
                            <td><?=round($result['amount'],2)?></td>
                            <td><?php if(empty($result['sid'])){echo "N/A";}else{echo $result['sid'];} ?></td>
                            <td><?=$result['date']?></td>
                            <td><?=$result['paid_by']?></td>
                            <td><a href="" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
                <div class="pagination-div">
                    <nav>
                       <ul class="pagination">
                            <li class="page-item">
                            <a class="page-link" href="expensedetails.php?page=<?=PRE($page)?>" aria-label="Previous">
                                <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                            </a>
                            </li>

                            <?php for($i=1; $i<=$req_pages; $i++){?>
                                <li class="page-item"><a class="page-link" href="expensedetails.php?page=<?=$i;?>"><?=$i;?></a></li>
                            <?php } ?>

                            <li class="page-item">
                            <a class="page-link" href="expensedetails.php?page=<?=NXT($page,$req_pages)?>" aria-label="Next">
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