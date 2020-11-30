<?php 
require "../config/systeminit.php";
    if(isset($_GET['unit']) && $panel_sys==="1"){
        $u=$_GET['unit'];
        $unit="";
        $result=QUERY_AND_FETCH($conn, "SELECT unit_no FROM unit WHERE house_id='$hid' AND unit_no='$u'");
        if(isset($_POST['update'])){
            if(empty(trim($_POST['unit']))){
                $empty=true;
            }
            else{
                $unit=INPUT_CLEAN($_POST['unit'],$conn);
            }
            
            if($empty!=true){
                UPDATE($conn,"UPDATE unit SET unit_no='$unit' WHERE house_id='$hid' AND unit_no='$u'");
                if(mysqli_affected_rows($conn)>0){
                    $success=true;
                    echo '<script>setTimeout(function(){window.open("unitlist.php","_self")},2000)</script>';
                }
                else if(mysqli_affected_rows($conn)<0){
                    $err=true;
                }
                else if(mysqli_affected_rows($conn)==0){
                    $nochange=true;
                }
            }
            else{
                $empty=true;
            }
        }
    }
    else{
        header("Location: unitlist.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Unit</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Edit Unit</h5>
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
                                <label for="lbl1"><span>&ast;</span>&ensp;Rename Unit</label>
                                <input name="unit" type="text" class="form-control " id="lbl1" value="<?=$result['unit_no'];?>">
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