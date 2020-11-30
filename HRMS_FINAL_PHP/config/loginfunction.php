<?php
    error_reporting(0);
    session_start();
    include "db.php";

    function validatePhone($value){
        $value=htmlentities($value);
        $value=trim($value);
        $value=stripslashes($value);
        $value=str_replace(' ', '', $value);
        $value=preg_replace('/[^0-9]/', '', $value);
        return $value;
    }

    function validatePwd($value){
        $value=htmlentities($value);
        $value=trim($value);
        $value=stripslashes($value);
        $value=str_replace(' ', '', $value);
        return $value;
    }

    function loginCheck($conn,$phone,$pwd,$panel){
        $query=mysqli_query($conn,"SELECT phone, pwd FROM login WHERE phone='$phone' AND pwd='$pwd' AND panel='$panel'");
        $row=mysqli_num_rows($query);
        return $row;
    }

    function QUERY_AND_FETCH($conn,$phone,$pwd,$panel){
        return mysqli_fetch_assoc(mysqli_query($conn,"SELECT panel, hid, user_id FROM login WHERE phone='$phone' AND pwd='$pwd' AND panel='$panel'"));
    }

?>