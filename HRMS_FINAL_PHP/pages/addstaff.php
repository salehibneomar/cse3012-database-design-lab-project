<?php 
session_start();
$panel_sys = $_SESSION['PANEL'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Staff</title>
<!-- ========== CSS ========== -->
<?php include "../includes/cdnstylesheets.php" ?>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <body>
<?php include "../includes/nav.php" ?>

    <section class="sec2">
        <div class="table-con">
            <div class="table-card">
                <h5 class="table-card-title">Add Staff</h5>
                <div class="card form-card">
                    <div class="card-body">
                        <form action="" method="post">
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Set ID</label>
                                <input class="form-control " type="text" name="" >
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Full Name</label>
                                <input class="form-control " type="text" name="" >
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Phone Number</label>
                                <input class="form-control " type="tel" name="" >
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Post</label>
                                <select class="form-control " name="" >
                                    <option >-- Post --</option>
                                    <option value="Janitor" >Janitor</option>
                                    <option value="Guard" >Guard</option>
                                    <option value="Monito" >Monitor</option>
                                </select>
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Monthly Salary</label>
                                <input class="form-control " type="text" name="">
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Previous workplace</label>
                                <input class="form-control " type="text" name="" >
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Date of birth</label>
                                <input class="form-control " type="date" name="">
                        </div>
                        <div class="form-group">
                            <label><span>&ast;</span>&ensp;Gender</label><br>
                                <select class="form-control " name="" >
                                    <option >-- Option --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                         </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Marital Status</label>
                                <select class="form-control " name="" >
                                    <option >-- Option --</option>
                                    <option value="Married" >Married</option>
                                    <option value="Unmarried" >Unmarried</option>
                                </select>
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;NID Number</label>
                                <input class="form-control " type="text" name="" >
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Present Address</label>
                                <textarea class="form-control " rows="3"></textarea>
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Permanent Address</label>
                                <textarea class="form-control " rows="3"></textarea>
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Joining Date</label>
                                <input class="form-control " type="date" name="" >
                        </div>
                        <div class="form-group">
                                <label ><span>&ast;</span>&ensp;Status</label>
                                <select class="form-control " name="" >
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                        </div>
                        <div class="form-group form-btn-set">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-broom"></i>&ensp;Clear</button>
                            <button name="" type="submit" class="btn btn-success"><i class="far fa-save"></i>&ensp;Save</button>
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