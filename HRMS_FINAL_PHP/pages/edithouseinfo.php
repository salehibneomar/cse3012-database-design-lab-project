<?php 
require "../config/systeminit.php";

    if(isset($_GET['hid']) && $panel_sys==="1" && !(empty($_GET['hid'])) && $_GET['hid']==$hid){
        $hname=$hloc=$hlen=$hwid=$helev=$hcctv="";
        $result=QUERY_AND_FETCH($conn, "SELECT * FROM house WHERE hid='$hid'");

        if(isset($_POST['update'])){

            if(empty(trim($_POST['hname'])) || empty(trim($_POST['hloc']))  || 
               empty(trim($_POST['hlen']))  || empty(trim($_POST['hwid']))  || 
               empty(trim($_POST['helev'])) || empty(trim($_POST['hcctv']))) {
                   
                $empty=true;
            }
            else{
                $hname=INPUT_CLEAN($_POST['hname'],$conn);
                $hloc=INPUT_CLEAN($_POST['hloc'],$conn);
                $hlen=INPUT_CLEAN($_POST['hlen'],$conn);
                $hwid=INPUT_CLEAN($_POST['hwid'],$conn);
                $helev=INPUT_CLEAN($_POST['helev'],$conn);
                $hcctv=INPUT_CLEAN($_POST['hcctv'],$conn);
            }

            if($empty!=true){
                UPDATE($conn,"UPDATE house SET name='$hname', location='$hloc', length='$hlen', width='$hwid' ,elevetors='$helev', cctvs='$hcctv' 
                        WHERE hid='$hid' AND oid='$user_id'");
                    if(mysqli_affected_rows($conn)>0){
                        $success=true;
                        echo '<script>setTimeout(function(){window.open("houseinfo.php","_self")},2000)</script>';
                    }
                    else if(mysqli_affected_rows($conn)<0){
                        $err=true;
                    }
                    else if(mysqli_affected_rows($conn)==0){
                        $nochange=true;
                    }
            }
        }

    }
    else{
        header("Location: houseinfo.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit House</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Edit House</h5>
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
                        <p><i class="fas fa-check-circle"></i>&emsp;Updated Successfully!&ensp;Taking you back.&emsp;<i class="fas fa-sync fa-spin"></i></p>
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
                    else if($nochange){
                        echo '<div class="alert alert-info alert-dismissible fade show animated slideInDown emptyAlert" role="alert">
                        <p><i class="far fa-times-circle"></i>&emsp;No Change!</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';} ?>
                    
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;House ID</label>
                                <input type="text" name="hid" class="form-control" value="<?=$result['hid']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Edit Name</label>
                                <input type="text" name="hname" class="form-control" value="<?=$result['name']?>">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Edit Location</label>
                                <input type="text" name="hloc" class="form-control" value="<?=$result['location']?>">
                            </div>
                            <div class="form-group">
                                <label>Length</label>
                                <input type="number" name="hlen" class="form-control" min="0" step="0.001" value="<?=$result['length']?>">
                            </div>
                            <div class="form-group">
                                <label>Width</label>
                                <input type="number" name="hwid" class="form-control" min="0" step="0.001" value="<?=$result['width']?>">
                            </div>
                            <div class="form-group">
                                <label>Elevetor Count</label>
                                <input type="number" name="helev" class="form-control" min="0" max="10" value="<?=$result['elevetors']?>">
                            </div>
                            <div class="form-group">
                                <label>CCTV Count</label>
                                <input type="number" name="hcctv" class="form-control" min="0" max="20" value="<?=$result['cctvs']?>">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Owner ID</label>
                                <input type="text" name="oid" class="form-control" value="<?=$result['oid']?>" readonly>
                            </div>
                            <div class="form-group form-btn-set">
                                <button type="reset" class="btn btn-danger"><i class="fas fa-broom"></i>&ensp;Clear</button>
                                <button name="update" type="submit" class="btn btn-info"><i class="fas fa-sync"></i>&ensp;Update</button>
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