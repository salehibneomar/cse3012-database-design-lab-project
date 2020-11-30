<?php 
require "../config/systeminit.php";
if($panel_sys==="1"){
    $page=1;
    $limit=10;
    $totalrows=ROW_COUNT($conn,"SELECT unit_no FROM unit WHERE house_id='$hid'");
    $req_pages=ceil($totalrows/$limit);
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    $start=($page-1)*$limit;
    $query=QUERY($conn,"SELECT unit_no, floor_no, availability FROM unit 
    WHERE house_id=$hid ORDER BY unit_no ASC LIMIT $start,$limit");
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
    <title>Unit List</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Unit List</h5>
                <div class="ov-handler">
                <table class="table table-bordered table-type-2 sortable-theme-minimal" data-sortable>
                    <thead>
                        <tr>
                            <th>Unit number</th>
                            <th>Floor</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($result=RESULT($query)){ ?>
                        <tr>
                            <td><?=$result['unit_no'];?></td>
                            <td><?=$result['floor_no'];?></td>
                            <td><?=$result['availability'];?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="editunit.php?unit=<?=$result['unit_no'];?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="delete.php?unit=<?=$result['unit_no'];?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
                <div class="pagination-div">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="unitlist.php?page=<?=PRE($page)?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                </a>
                            </li>
                            <?php for($i=1; $i<=$req_pages; $i++){?>
                                <li class="page-item">
                                    <a class="page-link" href="unitlist.php?page=<?=$i;?>"><?=$i;?></a>
                                </li>
                            <?php }?>
                            <li class="page-item">
                                <a class="page-link" href="unitlist.php?page=<?=NXT($page,$req_pages)?>" aria-label="Next">
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