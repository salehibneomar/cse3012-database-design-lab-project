<?php 
require "../config/systeminit.php";
if($panel_sys==="1"){
    $page=1;
    $limit=5;
    $totalRec=$srcval="";
    $totalrows=ROW_COUNT($conn,"SELECT sid FROM staff WHERE hid='$hid' AND oid='$user_id'");
    $req_pages=ceil($totalrows/$limit);
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    $start=($page-1)*$limit;
    $query=QUERY($conn,"SELECT sid,name,phone,designation,salary,status FROM staff WHERE hid='$hid' AND oid='$user_id' LIMIT $start,$limit");
    if(isset($_GET['src']) && !(empty($_GET['src']))){
        if(!(empty(trim($_GET['src'])))){
            $srcval=INPUT_CLEAN($_GET['src'],$conn);
            $query=QUERY($conn,"SELECT sid,name,phone,designation,salary,status FROM staff WHERE hid='$hid' AND oid='$user_id' AND phone='$srcval'");
            $totalRec=mysqli_num_rows($query)."&emsp;Records found.";
        }
    }
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
    <title>Staff List</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
    <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Staff List</h5>
            <div class="search-div">
                <form action="" method="get" onsubmit="REMOVE_EMPTY_GET_VAR();">
                    <div class="input-group">
                        <input id="inp" name="src" type="text" class="form-control" placeholder="Phone" maxlength="12" value="<?=$srcval;?>">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
                <div class="ov-handler">
                <table class="table table-bordered table-type-2 sortable-theme-minimal" data-sortable>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Designation</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($result=RESULT($query)){?>
                        <tr>
                            <td><?=$result['sid']?></td>
                            <td><?=$result['name']?></td>
                            <td><?=$result['phone']?></td>
                            <td><?=$result['designation']?></td>
                            <td><?=round($result['salary'],1)?></td>
                            <td><?php if($result['status']==1){echo'Active';}else{echo'In-active';}?></td>
                            <td>
                                <a href="staffinfo.php?sid=<?=$result['sid']?>" class="btn btn-sm btn-success"><i class="fas fa-folder-open"></i></a>
                                <a href="" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>    
                    </tbody>
                </table>
                    <span class="badge badge-info"><?=$totalRec;?></span>
                </div>
                <div class="pagination-div" id="pgn">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="stafflist.php?page=<?=PRE($page)?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                </a>
                            </li>
                            <?php for($i=1; $i<=$req_pages; $i++){?>
                                <li class="page-item">
                                    <a class="page-link" href="stafflist.php?page=<?=$i;?>"><?=$i;?></a>
                                </li>
                            <?php }?>
                            <li class="page-item">
                                <a class="page-link" href="stafflist.php?page=<?=NXT($page,$req_pages)?>" aria-label="Next">
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
        var srcval="<?=$srcval;?>";
        if(srcval.trim()!=""){
            document.getElementById('pgn').style.display="none";
        }

        function REMOVE_EMPTY_GET_VAR(){
            x=document.getElementById('inp').value;
            if(x.trim()==""){
                document.getElementById('inp').removeAttribute("name");
            }    
        }
    </script>
    </body>
</html>
<!-- ========== Developer ==========
Name: Saleh Ibne Omar.
Date created: 3 June 2019.
Last updated:
-->