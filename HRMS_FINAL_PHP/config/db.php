<?php

    $server="127.0.0.1";
    $spwd="";
    $suser="root";
    $db="hrms";
    $conn_err=false;

    $conn=mysqli_connect($server,$suser,$spwd,$db);

    if(!$conn){
        $conn_err=true;
    }

?>