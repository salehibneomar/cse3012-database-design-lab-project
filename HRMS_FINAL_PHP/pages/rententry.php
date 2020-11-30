<?php 
require "../config/systeminit.php";
    if($panel_sys==="1"){
        $amt=$dt=$rb=$tnid=$hsid="";
        if(isset($_POST['insert'])){
            if(empty(trim($_POST['amt'])) || empty(trim($_POST['dt'])) || 
            empty(trim($_POST['rb'])) || empty(trim($_POST['tnid']))){
                    $empty=true;
            }
            else{
                $amt=INPUT_CLEAN($_POST['amt'], $conn);
                $dt=INPUT_CLEAN($_POST['dt'], $conn);
                $rb=INPUT_CLEAN($_POST['rb'], $conn);
                $tnid=INPUT_CLEAN($_POST['tnid'], $conn);
            }

            if($empty!=true){
                INSERT($conn, "INSERT INTO rent(amount,date,received_by,tid,hid) VALUES('$amt','$dt','$rb','$tnid','$hid')");
                if(mysqli_affected_rows($conn)>0){
                    $success=true;
                    echo '<script>setTimeout(function(){window.open("rentaltransaction.php","_self")},2000)</script>';
                }
                else if(mysqli_affected_rows($conn)<0){
                    $err=true;
                }
            }
            else{
                $empty=true;
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
    <title>Rent Entry</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Rent Entry</h5>
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
                    </div>';} ?>

                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Amount</label>
                                <input type="number" class="form-control" name="amt" min="0" step="0.001">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Date</label>
                                <input type="date" name="dt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Received By</label>
                                <input type="text" name="rb" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Tenant ID</label>
                                <input type="text" name="tnid" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;House ID</label>
                                <input type="text" class="form-control" value="<?=$hid;?>" readonly>
                            </div>
                            <div class="form-group form-btn-set">
                                <button type="reset" class="btn btn-danger"><i class="fas fa-broom"></i>&ensp;Clear</button>
                                <button name="insert" type="submit" class="btn btn-success"><i class="far fa-save"></i>&ensp;Save</button>
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