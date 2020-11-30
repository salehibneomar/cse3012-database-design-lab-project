<?php 
require "config/loginfunction.php";

$empty=$invalid_crr=false;
$phone=$pwd=$panel="";

    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(empty(validatePhone($_POST['phone'])) || empty(validatePwd($_POST['pwd'])) || 
            empty(trim($_POST['logintype']))){
                $empty=true;
        }
        else{
            $phone=validatePhone($_POST['phone']);
            $pwd=validatePwd($_POST['pwd']);
            $panel=trim($_POST['logintype']);
        }

        if($empty!=true){
            $row=loginCheck($conn,$phone,$pwd,$panel);
            if($row==1){
                $result=QUERY_AND_FETCH($conn,$phone,$pwd,$panel);
                
                    $_SESSION['PANEL']=$result['panel'];
                    $_SESSION['HID']=$result['hid'];
                    $_SESSION['USER_ID']=$result['user_id'];
                    
                    header("Location: pages/dashboard.php");
            }
            else{
                $invalid_crr=true;
                $phone=$pwd=$panel="";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login panel</title>

<!-- ============= CSS ============= -->
    <link rel="icon" href="img/title_icon.png">  
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/stylesheet/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/login.css">

</head>
    <body>
        <?php
            if($empty){
                echo '<div class="alert alert-warning alert-dismissible fade show animated slideInDown emptyAlert" role="alert">
                <p><i class="fas fa-exclamation-triangle"></i>&emsp;Input empty or invalid!</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'; }
             else if($conn_err){
                echo '<div class="alert alert-danger alert-dismissible fade show animated slideInDown emptyAlert" role="alert">
                <p><i class="far fa-times-circle"></i>&emsp;Connection error!</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';}
            else if($invalid_crr){
                echo '<div class="alert alert-danger alert-dismissible fade show animated slideInDown emptyAlert" role="alert">
                <p><i class="fas fa-exclamation-circle"></i>&emsp;Invalid login credentials!</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';}?>

        <div class="wrapper">
            <div class="card-holder">
                <div class="card">
                    <div class="card-header">
                        <h2>HRMS Login</h2>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="input-field-margin-setter">
                                <div class="form-group">     
                                <i class="fas fa-mobile-alt"></i>
                                <input class="form-control" type="tel" name="phone" placeholder="Mobile number" maxlength="12">
                                </div>
                            </div>
                            <div class="input-field-margin-setter">
                                <div class="form-group">
                                <i class="fas fa-key"></i>
                                <input class="form-control" type="password" name="pwd" placeholder="Password">
                                </div>
                            </div>
                            <div class="input-field-margin-setter">
                                <div class="form-group">
                                <i class="fas fa-users-cog"></i>
                                <select class="form-control" name="logintype">
                                    <option value="">-- Login Type --</option>
                                    <option value="1">Owner</option>
                                    <option value="2">Tenant</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info login-btn" name="loginbtn">
                                        Login&ensp;<i class="fas fa-sign-in-alt"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p style="text-align:center;"><small class="text-muted">&copy; House name</small></p>
                    </div>
                </div>
            </div>
        </div>


<!-- ============= Scripts ============= -->
    <script src="js/modernizr-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/sweetalert.min.js"></script>

    </body>
</html>
<!-- ============= Developer =============  
Name: Saleh Ibne Omar.
Date created: 3 June 2019.
Last updated:
-->