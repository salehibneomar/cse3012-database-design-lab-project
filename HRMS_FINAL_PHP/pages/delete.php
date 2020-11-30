<?php
require "../config/systeminit.php";
    if($panel_sys==="1"){
        if(isset($_GET['unit']) && !(empty($_GET['unit']))){
            $unit=$_GET['unit'];
            DELETE($conn, "DELETE FROM unit WHERE unit_no='$unit' AND house_id='$hid'");
            if(mysqli_affected_rows($conn)>0){
                header("Location: unitlist.php");
            }
        }
    }
    else{
        header("Location: dashboard.php");
    }

?>