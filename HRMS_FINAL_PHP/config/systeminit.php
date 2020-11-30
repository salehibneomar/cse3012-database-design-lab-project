<?php
    error_reporting(0);
    session_cache_limiter(false);
    session_start();
    include "db.php";
    $panel_sys = $_SESSION['PANEL'];
    $hid=$_SESSION['HID'];
    $user_id=$_SESSION['USER_ID'];
    $result=$query="";
    $empty=false;
    $success=$err=$nochange=false;
    
    if(!(isset($_SESSION['PANEL'])) || empty($panel_sys) || !(isset($_SESSION['HID'])) || empty($hid) || !(isset($_SESSION['USER_ID'])) || empty($user_id)){
        header("Location: ../pages/logout.php");
    }

    function QUERY($conn,$sql){
        return mysqli_query($conn,$sql);
    }

    function RESULT($query){
        return mysqli_fetch_assoc($query);
    }

    function QUERY_AND_FETCH($conn,$sql){
        return mysqli_fetch_assoc(mysqli_query($conn,$sql));
    }

    function FIELD_NAME($conn,$sql){
        return mysqli_fetch_field(mysqli_query($conn,$sql));
    }

    function INPUT_CLEAN($value,$conn){
        $value=trim($value);
        $value=htmlentities($value);
        $value=mysqli_real_escape_string($conn,$value);
        return $value;
    }

    function UPDATE($conn,$sql){
        mysqli_query($conn,$sql);
    }

    function INSERT($conn,$sql){
        mysqli_query($conn,$sql);
    }

    function ROW_COUNT($conn,$sql){
        $query=mysqli_query($conn,$sql);
        return mysqli_num_rows($query);
    }


    function DELETE($conn,$sql){
        mysqli_query($conn,$sql);
    }

    function PRE($pre){
        if($pre<2){
            $pre=1;
        }
        else{
            $pre=$pre-1;
        }
        return $pre;
    }

    function NXT($nxt, $req){
        if($nxt>=$req){
            if($req==0){
                $nxt=1;
            }
            else{
                $nxt=$req;
            }
        }
        else{
            $nxt=$nxt+1;
        }
        return $nxt;
    }
?>