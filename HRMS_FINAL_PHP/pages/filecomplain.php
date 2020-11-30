<?php 
require "../config/systeminit.php";
$act=true;
    if($panel_sys==="2"){
        $sts=QUERY_AND_FETCH($conn,"SELECT status FROM tenant WHERE tid='$user_id' AND hid='$hid'");
        $prb=$dt="";
        if(isset($_POST['insert'])){
            if(empty(trim($_POST['prb'])) || empty(trim($_POST['dt']))){
                $empty=true;
            }
            else{
                $prb=INPUT_CLEAN($_POST['prb'],$conn);
                $dt=INPUT_CLEAN($_POST['dt'],$conn);
            }
            
            if($sts['status']==1){
                if($empty!=true){
                    $result=QUERY_AND_FETCH($conn,"SELECT oid FROM house WHERE hid='$hid'");
                    $orid=$result['oid'];
                    $row=ROW_COUNT($conn,"SELECT cid FROM complain WHERE problem='$prb' AND hid='$hid'");
                    if($row>0){
                        $prb=$prb."(".($row+1).")";
                    }
                    INSERT($conn,"INSERT INTO complain(problem,date,status,tid,hid,oid)
                                  VALUES('$prb','$dt',0,'$user_id','$hid',$orid)");
                    if(mysqli_affected_rows($conn)>0){
                        $success=true;
                        echo '<script>setTimeout(function(){window.open("tenantcomplains.php","_self")},2000)</script>';
                    }
                    else if(mysqli_affected_rows($conn)<0){
                        $err=true;
                    }
                }
                else{
                    $empty=true;
                }
            }
            else{
                $act=false;
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
    <title>File Complain</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">File Complain</h5>
                <div class="card form-card">
                <?php 
                    if($empty){
                        echo '<div class="alert alert-warning alert-dismissible fade show animated slideInDown emptyAlert" role="alert">
                        <p><i class="fas fa-exclamation-triangle"></i>&emsp;Missing input fields!</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'; }
                    else if($success){
                        echo '<div class="alert alert-success alert-dismissible fade show animated slideInDown emptyAlert" role="alert">
                        <p><i class="fas fa-check-circle"></i>&emsp;Successfully Inserted!&ensp;Taking you to the list.&emsp;<i class="fas fa-sync fa-spin"></i></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';}
                    else if($err){
                        echo '<div class="alert alert-danger alert-dismissible fade show animated slideInDown emptyAlert" role="alert">
                        <p><i class="far fa-times-circle"></i>&emsp;Connection error!</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';} 
                    else if($act==false){
                        echo '<div class="alert alert-dark alert-dismissible fade show animated slideInDown emptyAlert" role="alert">
                        <p><i class="fas fa-exclamation"></i>&emsp;You are no longer an active tenant to complain.</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';} ?>

                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Problem</label>
                                <input type="text" class="form-control" name="prb" placeholder="E.G.: Water tap problem">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Date</label>
                                <input type="text" name="dt" class="form-control" value="<?=date("Y-m-d");?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Tenant ID</label>
                                <input type="text" class="form-control" value="<?=$user_id;?>" readonly>
                            </div>
                            <div class="form-group form-btn-set">
                                <button type="reset" class="btn btn-danger"><i class="fas fa-broom"></i>&ensp;Clear</button>
                                <button name="insert" type="submit" class="btn btn-info"><i class="fas fa-check"></i>&ensp;Submit</button>
                            </div>
                        </form>
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