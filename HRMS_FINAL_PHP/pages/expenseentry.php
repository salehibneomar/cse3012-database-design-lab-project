<?php 
require "../config/systeminit.php";
    if($panel_sys==="1"){
        $title=$amt=$dt=$pdb=$sid="";
        if(isset($_POST['insert'])){
            if(trim($_POST['ttl'])==="--Title--" || empty(trim($_POST['amt'])) || 
               empty(trim($_POST['dt'])) || empty(trim($_POST['pdb']))){
                $empty=true;
            }
            else{
                if(trim($_POST['ttl'])==="Staff Fee"){
                    if(empty(trim($_POST['sid']))){
                        $empty=true;
                    }
                    else{
                        $sid=INPUT_CLEAN($_POST['sid'],$conn);
                    }
                }
                $title=INPUT_CLEAN($_POST['ttl'],$conn);
                $amt=INPUT_CLEAN($_POST['amt'],$conn);
                $dt=INPUT_CLEAN($_POST['dt'],$conn);
                $pdb=INPUT_CLEAN($_POST['pdb'],$conn);
                
                if($empty!=true){
                    INSERT($conn,"INSERT INTO expense(title,date,amount,paid_by,sid,hid,oid) 
                    VALUES('$title','$dt','$amt','$pdb','$sid','$hid','$user_id')");
                    if(mysqli_affected_rows($conn)>0){
                        $success=true;
                        echo '<script>setTimeout(function(){window.open("expensedetails.php","_self")},2000)</script>';
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
    }
    else{
        header("Location: expensedetails.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Entry</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
            <h5 class="table-card-title">Expense Entry</h5>
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
                                <label ><span>&ast;</span>&ensp;Title</label>
                                <select class="form-control " name="ttl" id="explist">
                                    <option >--Title--</option>
                                    <option value="Water Bill">Water Bill</option>
                                    <option value="Gas Bill">Gas Bill</option>
                                    <option value="Electricity Bil">Electricity Bill</option>
                                    <option value="Maintance and Repair">Maintance and Repair</option>
                                    <option value="Staff Fee">Staff Fee</option>
                                    <option value="Extra">Extra</option>
                                </select>
                            </div>
                            <div class="form-group" id="empidinput" style="display:none;">
                                <label><span>&ast;</span>&ensp;SID</label>
                                <input type="text" name="sid" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Amount</label>
                                <input type="number" name="amt" class="form-control" min="0" step="0.001">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Date</label>
                                <input type="date" name="dt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Paid By</label>
                                <input type="text" name="pdb" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;House ID</label>
                                <input type="text" class="form-control" value="<?=$hid;?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><span>&ast;</span>&ensp;Owner ID</label>
                                <input type="text" class="form-control" value="<?=$user_id;?>" readonly>
                            </div>
                            <div class="form-group form-btn-set">
                                <button type="reset" class="btn btn-danger"><i class="fas fa-broom"></i>&ensp;Clear</button>
                                <button type="submit" name="insert" class="btn btn-success"><i class="far fa-save"></i>&ensp;Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- ========== Scripts ========== -->
<?php include "../includes/cdnscripts.php" ?>
    <script>

        function viewempid(){
            if(document.getElementById("explist").value=="Staff Fee"){
                document.getElementById("empidinput").style.display="block";
            }
            else{
                document.getElementById("empidinput").style.display="none";
            }
        }

        document.getElementById("explist").addEventListener('change',viewempid);

    </script>
    </body>
</html>
<!-- ========== Developer ==========
Name: Saleh Ibne Omar.
Date created: 3 June 2019.
Last updated:
-->