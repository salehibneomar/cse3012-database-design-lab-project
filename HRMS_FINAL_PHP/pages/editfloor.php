<?php 
require "../config/systeminit.php";

    if(isset($_GET['floor']) && $panel_sys==="1"){
        $f=$_GET['floor'];
        $result=QUERY_AND_FETCH($conn, "SELECT DISTINCT(floor_no) FROM unit WHERE house_id='$hid' AND floor_no='$f'");
        $floor="";
        if(isset($_POST['update'])){
            if(empty(trim($_POST['floor']))){
                $empty=true;
            }
            else{
                $floor=INPUT_CLEAN($_POST['floor'],$conn);
            }

            if($empty!=true){
                UPDATE($conn,"UPDATE unit SET floor_no='$floor' WHERE house_id='$hid' AND floor_no='$f'");
                if(mysqli_affected_rows($conn)>0){
                    $success=true;
                    echo '<script>setTimeout(function(){window.open("floorlist.php","_self")},2000)</script>';
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
        header("Location: floorlist.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Floor</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Edit Floor</h5>
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
                                <label for="lbl1"><span>&ast;</span>&ensp;Rename Floor</label>
                                <input name="floor" type="text" class="form-control " id="lbl1" value="<?=$result['floor_no'];?>">
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